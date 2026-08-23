<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:role-table')->only(['index', 'show']);
        $this->middleware('permission:role-add')->only(['create', 'store']);
        $this->middleware('permission:role-edit')->only(['edit', 'update']);
        $this->middleware('permission:role-delete')->only(['delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->search != '' || $request->search) {
            $data = Role::where(function ($query) use ($request) {
                $query->where('roles.name', 'LIKE', "%$request->search%")
                    ->orWhere('roles.guard_name', 'LIKE', "%$request->search%");
            })->paginate(10);
        } else {
            $data = Role::paginate(10);
        }

        return view('admin.roles.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = self::groupedPermissions();

        return view('admin.roles.create', compact('groups'));
    }

    /**
     * Group every admin permission by resource, with an Arabic label, so the
     * role form can render a scannable checklist instead of one flat list.
     */
    public static function groupedPermissions(): array
    {
        $labels = [
            'role'                   => 'الأدوار والصلاحيات',
            'employee'               => 'الموظفين',
            'doctor'                 => 'الأطباء',
            'service'                => 'الخدمات',
            'branch'                 => 'الفروع',
            'faq'                    => 'الأسئلة الشائعة',
            'insurance-company'      => 'شركات التأمين',
            'video'                  => 'الفيديوهات',
            'testimonial'            => 'آراء المرضى',
            'career-job'             => 'الوظائف الشاغرة',
            'stat'                   => 'الإحصائيات',
            'article'                => 'المقالات',
            'chatbot'                => 'قاعدة معرفة الشات بوت',
            'banner'                 => 'البانرات',
            'subscription-plan'      => 'باقات الاشتراك',
            'subscription-order'     => 'طلبات الاشتراك',
            'appointment'            => 'طلبات الحجز',
            'job-application'        => 'طلبات التوظيف',
            'contact-message'        => 'رسائل التواصل',
            'setting'                => 'الإعدادات',
        ];

        $actionLabels = [
            'table'  => 'عرض',
            'add'    => 'إضافة',
            'edit'   => 'تعديل',
            'delete' => 'حذف',
            'status' => 'تحديث الحالة',
            'reply'  => 'الرد',
        ];

        $permissions = Permission::where('guard_name', 'admin')->orderBy('name')->get();

        $groups = [];
        foreach ($permissions as $permission) {
            $lastDash = strrpos($permission->name, '-');
            $resource = substr($permission->name, 0, $lastDash);
            $action   = substr($permission->name, $lastDash + 1);

            if (! isset($groups[$resource])) {
                $groups[$resource] = [
                    'label' => $labels[$resource] ?? $resource,
                    'items' => [],
                ];
            }

            $groups[$resource]['items'][] = [
                'id'    => $permission->id,
                'label' => $actionLabels[$action] ?? $action,
            ];
        }

        return $groups;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|unique:roles,name',
            'perms' => 'required|array|min:1',
        ]);

        DB::beginTransaction();
        try {
            $role = Role::create([
                'name'       => $request->name,
                'guard_name' => 'admin',
            ]);

            $role->syncPermissions(Permission::whereIn('id', $request->perms)->get());

            DB::commit();

            return redirect()->route('admin.role.index')->with('success', trans('messages.success'));
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();

            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $groups = self::groupedPermissions();
        $role = Role::findOrFail($id);
        $role_permissions = $role->permissions->pluck('id')->toArray();

        return view('admin.roles.edit', compact('groups', 'role_permissions', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|unique:roles,name,' . $id,
            'perms' => 'required|array|min:1',
        ]);

        DB::beginTransaction();
        try {
            $role = Role::findOrFail($id);
            $role->name = $request->name;
            $role->save();

            $role->syncPermissions(Permission::whereIn('id', $request->perms)->get());

            DB::commit();

            return redirect()->route('admin.role.index')->with('success', trans('messages.success'));
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();

            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $role = Role::find($request->id);

        if ($role) {
            $role->syncPermissions([]);
            $role->delete();
        }

        return redirect()->route('admin.role.index')->with('success', 'تم حذف الدور بنجاح.');
    }
}
