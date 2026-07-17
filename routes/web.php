<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::group([
    'prefix'     => LaravelLocalization::setLocale(),
    'middleware' => ['localizationRedirect', 'localeViewPath'],
], function () {

    // ── Public front routes ───────────────────────────────────────────────
    Route::get('/',               [HomeController::class, 'index'])->name('home');
    Route::post('/contact',       [HomeController::class, 'contact'])->name('contact.store');
    Route::post('/appointments',  [HomeController::class, 'storeAppointment'])->name('appointments.store');

    Route::get('/articles',           [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

});
