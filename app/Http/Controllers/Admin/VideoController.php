<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::orderBy('order_index')->get();
        return view('admin.videos.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.videos.create');
    }

    private function rules(): array
    {
        return [
            'title_ar'    => 'required|string|max:200',
            'title_en'    => 'required|string|max:200',
            'tag_ar'      => 'nullable|string|max:100',
            'tag_en'      => 'nullable|string|max:100',
            'video_url'   => 'nullable|url|max:255',
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'is_main'     => 'nullable|boolean',
            'order_index' => 'nullable|integer',
        ];
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = uploadImage('assets/uploads/videos', $request->file('thumbnail'));
        }

        $data['is_main']     = $request->boolean('is_main');
        $data['is_active']   = $request->boolean('is_active', true);
        $data['order_index'] = $data['order_index'] ?? 0;

        Video::create($data);

        return redirect()->route('admin.videos.index')->with('success', 'تمت إضافة الفيديو بنجاح.');
    }

    public function edit(Video $video)
    {
        return view('admin.videos.edit', compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $data = $request->validate($this->rules());

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = uploadImage('assets/uploads/videos', $request->file('thumbnail'));
        }

        $data['is_main']     = $request->boolean('is_main');
        $data['is_active']   = $request->boolean('is_active');
        $data['order_index'] = $data['order_index'] ?? 0;

        $video->update($data);

        return redirect()->route('admin.videos.index')->with('success', 'تم تحديث الفيديو بنجاح.');
    }

    public function destroy(Video $video)
    {
        $video->delete();
        return back()->with('success', 'تم حذف الفيديو.');
    }

    public function toggleActive(Video $video)
    {
        $video->update(['is_active' => ! $video->is_active]);
        return back()->with('success', 'تم تحديث الحالة.');
    }
}
