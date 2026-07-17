<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::published()->paginate(9);

        return view('front.articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        abort_unless($article->is_active && $article->published_at && $article->published_at->isPast(), 404);

        $relatedArticles = Article::published()
            ->where('id', '!=', $article->id)
            ->limit(3)
            ->get();

        return view('front.articles.show', compact('article', 'relatedArticles'));
    }
}
