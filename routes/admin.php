<?php

use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\CareerJobController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\InsuranceCompanyController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\StatController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\VideoController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Spatie\Permission\Models\Permission;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localizationRedirect', 'localeViewPath']], function () {

    Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {

        // ── Dashboard ─────────────────────────────────────────────────
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

        // ── Admin profile ─────────────────────────────────────────────
        Route::get('/admin/edit/{id}',    [LoginController::class, 'editlogin'])->name('admin.login.edit');
        Route::post('/admin/update/{id}', [LoginController::class, 'updatelogin'])->name('admin.login.update');

        // ── Roles & Employees ─────────────────────────────────────────
        Route::resource('employee', EmployeeController::class, ['as' => 'admin']);
        Route::get('role',               [RoleController::class, 'index'])->name('admin.role.index');
        Route::get('role/create',        [RoleController::class, 'create'])->name('admin.role.create');
        Route::get('role/{id}/edit',     [RoleController::class, 'edit'])->name('admin.role.edit');
        Route::patch('role/{id}',        [RoleController::class, 'update'])->name('admin.role.update');
        Route::post('role',              [RoleController::class, 'store'])->name('admin.role.store');
        Route::post('admin/role/delete', [RoleController::class, 'delete'])->name('admin.role.delete');

        Route::get('/permissions/{guard_name}', function ($guard_name) {
            return response()->json(Permission::where('guard_name', $guard_name)->get());
        });

        // ── Site settings ────────────────────────────────────────────
        Route::get('site-settings',  [SiteSettingController::class, 'edit'])->name('admin.site-settings.edit');
        Route::post('site-settings', [SiteSettingController::class, 'update'])->name('admin.site-settings.update');

        // ── Clinic content modules ──────────────────────────────────
        Route::post('services/{service}/toggle', [ServiceController::class, 'toggleActive'])->name('admin.services.toggle');
        Route::resource('services', ServiceController::class, ['as' => 'admin']);

        Route::post('doctors/{doctor}/toggle', [DoctorController::class, 'toggleActive'])->name('admin.doctors.toggle');
        Route::resource('doctors', DoctorController::class, ['as' => 'admin']);

        Route::post('branches/{branch}/toggle', [BranchController::class, 'toggleActive'])->name('admin.branches.toggle');
        Route::resource('branches', BranchController::class, ['as' => 'admin']);

        Route::post('faqs/{faq}/toggle', [FaqController::class, 'toggleActive'])->name('admin.faqs.toggle');
        Route::resource('faqs', FaqController::class, ['as' => 'admin']);

        Route::post('insurance-companies/{insurance_company}/toggle', [InsuranceCompanyController::class, 'toggleActive'])->name('admin.insurance-companies.toggle');
        Route::resource('insurance-companies', InsuranceCompanyController::class, ['as' => 'admin']);

        Route::post('videos/{video}/toggle', [VideoController::class, 'toggleActive'])->name('admin.videos.toggle');
        Route::resource('videos', VideoController::class, ['as' => 'admin']);

        Route::post('testimonials/{testimonial}/toggle', [TestimonialController::class, 'toggleActive'])->name('admin.testimonials.toggle');
        Route::resource('testimonials', TestimonialController::class, ['as' => 'admin']);

        Route::post('career-jobs/{career_job}/toggle', [CareerJobController::class, 'toggleActive'])->name('admin.career-jobs.toggle');
        Route::resource('career-jobs', CareerJobController::class, ['as' => 'admin']);

        Route::post('stats/{stat}/toggle', [StatController::class, 'toggleActive'])->name('admin.stats.toggle');
        Route::resource('stats', StatController::class, ['as' => 'admin']);

        Route::post('articles/{article}/toggle', [ArticleController::class, 'toggleActive'])->name('admin.articles.toggle');
        Route::resource('articles', ArticleController::class, ['as' => 'admin']);

        // ── Appointments (bookings) ─────────────────────────────────
        Route::get('appointments',                       [AppointmentController::class, 'index'])->name('admin.appointments.index');
        Route::get('appointments/{appointment}',          [AppointmentController::class, 'show'])->name('admin.appointments.show');
        Route::post('appointments/{appointment}/status',  [AppointmentController::class, 'updateStatus'])->name('admin.appointments.status');
        Route::delete('appointments/{appointment}',       [AppointmentController::class, 'destroy'])->name('admin.appointments.destroy');

        // ── Banners ───────────────────────────────────────────────────
        Route::post('banners/{banner}/toggle', [BannerController::class, 'toggleActive'])->name('admin.banners.toggle');
        Route::resource('banners', BannerController::class, ['as' => 'admin']);

        // ── Contact Messages ──────────────────────────────────────────
        Route::get('contact-messages',              [ContactMessageController::class, 'index'])->name('admin.contact_messages.index');
        Route::get('contact-messages/{contactMessage}', [ContactMessageController::class, 'show'])->name('admin.contact_messages.show');
        Route::post('contact-messages/{contactMessage}/reply', [ContactMessageController::class, 'reply'])->name('admin.contact_messages.reply');
        Route::delete('contact-messages/{contactMessage}', [ContactMessageController::class, 'destroy'])->name('admin.contact_messages.destroy');
    });

    Route::group(['prefix' => 'admin', 'middleware' => 'guest:admin'], function () {
        Route::get('login',  [LoginController::class, 'show_login_view'])->name('admin.showlogin');
        Route::post('login', [LoginController::class, 'login'])->name('admin.login');
    });
});
