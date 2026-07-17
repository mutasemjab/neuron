<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Response;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SitemapController extends Controller
{
    public function index()
    {
        $locales = array_keys(LaravelLocalization::getSupportedLocales());
        $articles = Article::published()->get();

        $urls = [];

        foreach ($locales as $locale) {
            $urls[] = [
                'loc'        => LaravelLocalization::getLocalizedURL($locale, '/'),
                'lastmod'    => now()->toAtomString(),
                'changefreq' => 'weekly',
                'priority'   => '1.0',
            ];

            $urls[] = [
                'loc'        => LaravelLocalization::getLocalizedURL($locale, route('articles.index', [], false)),
                'lastmod'    => now()->toAtomString(),
                'changefreq' => 'weekly',
                'priority'   => '0.8',
            ];

            foreach ($articles as $article) {
                $urls[] = [
                    'loc'        => LaravelLocalization::getLocalizedURL($locale, route('articles.show', $article, false)),
                    'lastmod'    => $article->updated_at->toAtomString(),
                    'changefreq' => 'monthly',
                    'priority'   => '0.6',
                ];
            }
        }

        $xml = view('sitemap', compact('urls'))->render();

        return Response::make($xml, 200)->header('Content-Type', 'text/xml');
    }
}
