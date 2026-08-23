<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:employee-table')->only(['index', 'show']);
        $this->middleware('permission:employee-add')->only(['create', 'store']);
        $this->middleware('permission:employee-edit')->only(['edit', 'update']);
        $this->middleware('permission:employee-delete')->only(['destroy']);
    }

    public function index(Request $request)
    {
        $data = Admin::where('is_super', 0);
        if ($request->search != '' || $request->search) {
            $data->where(function ($query) use ($request) {
                $query->where('admins.name', 'LIKE', "%$request->search%")
                    ->orWhere('admins.email', 'LIKE', "%$request->search%")
                    ->orWhere('admins.mobile', 'LIKE', "%$request->search%");
            });
        }
        $data = $data->paginate(10);

        return view('admin.employee.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('guard_name', 'admin')->get();

        return view('admin.employee.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'email'    => 'required|unique:admins,email',
            'password' => 'required',
            'roles'    => 'required|array|min:1',
        ]);

        try {
            $admin = Admin::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);

            $admin->syncRoles(Role::whereIn('id', $request->roles)->get());

            return redirect()->route('admin.employee.index')
                ->with('success', 'Employee created successfully');
        } catch (Exception $e) {
            Log::error('Error creating employee', ['message' => $e->getMessage()]);

            return redirect()->route('admin.employee.index')
                ->with('error', 'Something Wrong');
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
        return redirect()->route('admin.employee.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        $roles = Role::where('guard_name', 'admin')->get();
        $adminRole = $admin->roles->pluck('id')->all();

        return view('admin.employee.edit', compact('admin', 'roles', 'adminRole'));
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
        $this->validate($request, [
            'name'  => 'required',
            'email' => 'required|unique:admins,email,' . $id,
            'roles' => 'required|array|min:1',
        ]);

        try {
            $admin = Admin::findOrFail($id);

            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->username = $request->username;
            if ($request->password) {
                $admin->password = Hash::make($request->password);
            }
            $admin->save();

            $admin->syncRoles(Role::whereIn('id', $request->roles)->get());

            return redirect()->route('admin.employee.index')
                ->with('success', 'Employee updated successfully');
        } catch (Exception $e) {
            Log::error('Error updating employee', ['message' => $e->getMessage()]);

            return redirect()->route('admin.employee.index')
                ->with('error', 'Something Wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $admin = Admin::findOrFail($id);
            $admin->syncRoles([]);
            $admin->delete();

            return redirect()->route('admin.employee.index')
                ->with('success', 'Admin deleted successfully');
        } catch (Exception $e) {
            Log::error('Error deleting employee', ['message' => $e->getMessage()]);

            return redirect()->route('admin.employee.index')
                ->with('error', 'Something Error');
        }
    }
}
