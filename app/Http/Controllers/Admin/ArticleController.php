<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest('id')->get();
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    private function rules(): array
    {
        return [
            'title_ar'             => 'required|string|max:200',
            'title_en'             => 'required|string|max:200',
            'excerpt_ar'           => 'required|string|max:500',
            'excerpt_en'           => 'required|string|max:500',
            'body_ar'              => 'required|string',
            'body_en'              => 'required|string',
            'category_ar'          => 'nullable|string|max:100',
            'category_en'          => 'nullable|string|max:100',
            'image'                => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'read_minutes'         => 'nullable|integer|min:1',
            'meta_title_ar'        => 'nullable|string|max:255',
            'meta_title_en'        => 'nullable|string|max:255',
            'meta_description_ar'  => 'nullable|string|max:255',
            'meta_description_en'  => 'nullable|string|max:255',
            'published_at'         => 'nullable|date',
        ];
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());

        if ($request->hasFile('image')) {
            $data['image'] = uploadImage('assets/uploads/articles', $request->file('image'));
        }

        $data['slug']         = $this->uniqueSlug($data['title_en'] ?: $data['title_ar']);
        $data['read_minutes'] = $data['read_minutes'] ?? 5;
        $data['published_at'] = $data['published_at'] ?? now();
        $data['is_active']    = $request->boolean('is_active', true);

        Article::create($data);

        return redirect()->route('admin.articles.index')->with('success', 'تمت إضافة المقال بنجاح.');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $data = $request->validate($this->rules());

        if ($request->hasFile('image')) {
            $data['image'] = uploadImage('assets/uploads/articles', $request->file('image'));
        }

        $data['read_minutes'] = $data['read_minutes'] ?? 5;
        $data['published_at'] = $data['published_at'] ?? $article->published_at;
        $data['is_active']    = $request->boolean('is_active');

        $article->update($data);

        return redirect()->route('admin.articles.index')->with('success', 'تم تحديث المقال بنجاح.');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return back()->with('success', 'تم حذف المقال.');
    }

    public function toggleActive(Article $article)
    {
        $article->update(['is_active' => ! $article->is_active]);
        return back()->with('success', 'تم تحديث الحالة.');
    }

    private function uniqueSlug(string $source): string
    {
        $base = Str::slug($source) ?: 'article';
        $slug = $base;
        $i = 1;

        while (Article::where('slug', $slug)->exists()) {
            $slug = "{$base}-" . $i++;
        }

        return $slug;
    }
}
