<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CareerApplicationController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\SubscriptionCheckoutController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::group([
    'prefix'     => LaravelLocalization::setLocale(),
    'middleware' => ['localizationRedirect', 'localeViewPath'],
], function () {

    // ── Public front routes ───────────────────────────────────────────────
    Route::get('/',               [HomeController::class, 'index'])->name('home');
    Route::get('/book-appointment', [HomeController::class, 'bookingPage'])->name('booking.page');
    Route::post('/contact',       [HomeController::class, 'contact'])->name('contact.store');
    Route::post('/appointments',  [HomeController::class, 'storeAppointment'])->name('appointments.store');
    Route::post('/consultations', [HomeController::class, 'storeConsultation'])->name('consultations.store');
    Route::view('/privacy-policy', 'front.privacy_policy')->name('privacy.policy');
    Route::view('/terms', 'front.terms')->name('terms.conditions');

    Route::get('/articles',           [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

    Route::get('/doctors/{doctor}', [DoctorController::class, 'show'])->name('doctors.show');

    Route::get('/careers/{careerJob}/apply',  [CareerApplicationController::class, 'show'])->name('careers.apply');
    Route::post('/careers/{careerJob}/apply', [CareerApplicationController::class, 'store'])->name('careers.apply.store');

    // Chatbot
    Route::post('/chatbot/message', [ChatbotController::class, 'message'])->name('chatbot.message');
    Route::post('/chatbot/clear',   [ChatbotController::class, 'clearHistory'])->name('chatbot.clear');

    // Subscription plan checkout (Bank al Etihad)
    Route::post('/subscriptions/{subscriptionPlan}/checkout', [SubscriptionCheckoutController::class, 'store'])->name('subscriptions.checkout');
    Route::post('/subscriptions/orders/{subscriptionOrder}/result', [SubscriptionCheckoutController::class, 'result'])->name('subscriptions.result');

});
