<aside class="sidebar" id="sidebar">

    
    <div class="sidebar-brand">
        <div class="brand-icon">
            <img src="<?php echo e(asset_v('assets_front/images/logonav.png')); ?>" alt="<?php echo e(sett('identity.site_name')); ?>">
        </div>
        <span class="brand-text"><?php echo e(__('messages.edu_platform')); ?></span>
    </div>

    
    <nav class="sidebar-nav">

        <div class="nav-label"><?php echo e(__('messages.main')); ?></div>
        <ul>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.dashboard')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-speedometer2"></i>
                    <span><?php echo e(__('messages.dashboard')); ?></span>
                </a>
            </li>
        </ul>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['appointment-table', 'consultation-table', 'contact-message-table', 'job-application-table', 'closed-date-table'])): ?>
        <div class="nav-label"><?php echo e(__('messages.bookings')); ?></div>
        <ul>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('appointment-table')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.appointments.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.appointments.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-calendar-check"></i>
                    <span><?php echo e(__('messages.appointments')); ?></span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('consultation-table')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.consultations.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.consultations.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-camera-video"></i>
                    <span>الاستشارات الأونلاين</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('closed-date-table')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.closed-dates.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.closed-dates.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-calendar-x"></i>
                    <span>العطل والأيام المغلقة</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact-message-table')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.contact_messages.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.contact_messages.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-envelope"></i>
                    <span><?php echo e(__('messages.contact_messages')); ?></span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('job-application-table')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.job-applications.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.job-applications.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-person-badge"></i>
                    <span><?php echo e(__('messages.job_applications')); ?></span>
                </a>
            </li>
            <?php endif; ?>
        </ul>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['doctor-table', 'service-table', 'branch-table', 'article-table', 'testimonial-table', 'faq-table', 'insurance-company-table', 'video-table', 'career-job-table', 'stat-table', 'banner-table', 'subscription-plan-table'])): ?>
        <div class="nav-label"><?php echo e(__('messages.content')); ?></div>
        <ul>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('doctor-table')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.doctors.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.doctors.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-person-badge"></i>
                    <span><?php echo e(__('messages.doctors')); ?></span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('service-table')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.services.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.services.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-heart-pulse"></i>
                    <span><?php echo e(__('messages.services')); ?></span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('branch-table')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.branches.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.branches.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-geo-alt"></i>
                    <span><?php echo e(__('messages.branches')); ?></span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('article-table')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.articles.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.articles.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-journal-text"></i>
                    <span><?php echo e(__('messages.articles')); ?></span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('testimonial-table')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.testimonials.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.testimonials.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-chat-quote"></i>
                    <span><?php echo e(__('messages.testimonials')); ?></span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('faq-table')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.faqs.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.faqs.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-question-circle"></i>
                    <span><?php echo e(__('messages.faqs')); ?></span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('insurance-company-table')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.insurance-companies.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.insurance-companies.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-shield-check"></i>
                    <span><?php echo e(__('messages.insurance_companies')); ?></span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('video-table')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.videos.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.videos.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-play-circle"></i>
                    <span><?php echo e(__('messages.videos')); ?></span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('career-job-table')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.career-jobs.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.career-jobs.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-briefcase"></i>
                    <span><?php echo e(__('messages.career_jobs')); ?></span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('stat-table')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.stats.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.stats.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-graph-up"></i>
                    <span><?php echo e(__('messages.stats')); ?></span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('banner-table')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.banners.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.banners.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-images"></i>
                    <span><?php echo e(__('messages.banners')); ?></span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('subscription-plan-table')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.subscription-plans.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.subscription-plans.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-credit-card-2-front"></i>
                    <span><?php echo e(__('messages.subscription_plans')); ?></span>
                </a>
            </li>
            <?php endif; ?>
        </ul>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('subscription-order-table')): ?>
        <div class="nav-label"><?php echo e(__('messages.bookings')); ?></div>
        <ul>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.subscription-orders.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.subscription-orders.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-wallet2"></i>
                    <span><?php echo e(__('messages.subscription_orders')); ?></span>
                </a>
            </li>
        </ul>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('chatbot-table')): ?>
        <div class="nav-label">الشات بوت</div>
        <ul>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.chatbot.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.chatbot.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-robot"></i>
                    <span>قاعدة معرفة المساعد</span>
                </a>
            </li>
        </ul>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['employee-table', 'role-table', 'setting-edit'])): ?>
        <div class="nav-label"><?php echo e(__('messages.system')); ?></div>
        <ul>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('employee-table')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.employee.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.employee.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-people"></i>
                    <span><?php echo e(__('messages.Employee')); ?></span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-table')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.role.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.role.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-shield-check"></i>
                    <span><?php echo e(__('messages.roles_permissions')); ?></span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('setting-edit')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.site-settings.edit')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.site-settings.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-gear"></i>
                    <span><?php echo e(__('messages.site_settings')); ?></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.site-settings.edit')); ?>#tab-legal_pages" class="nav-link">
                    <i class="nav-icon bi bi-file-earmark-text"></i>
                    <span>سياسة الخصوصية والشروط</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.site-settings.edit')); ?>#tab-contact" class="nav-link">
                    <i class="nav-icon bi bi-envelope-check"></i>
                    <span>إشعارات الحجوزات بالبريد</span>
                </a>
            </li>
            <?php endif; ?>
        </ul>
        <?php endif; ?>

    </nav>

    
    <div class="sidebar-footer">
        <ul>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.login.edit', auth('admin')->id())); ?>" class="nav-link">
                    <i class="nav-icon bi bi-gear"></i>
                    <span><?php echo e(__('messages.settings')); ?></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"
                    onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();">
                    <i class="nav-icon bi bi-box-arrow-right"></i>
                    <span><?php echo e(__('messages.sign_out')); ?></span>
                </a>
            </li>
        </ul>
        <button class="sidebar-collapse-btn" id="sidebarCollapseBtn" title="<?php echo e(__('messages.collapse_sidebar')); ?>">
            <i class="bi bi-arrow-bar-left"></i>
        </button>
    </div>

</aside>
<?php /**PATH C:\xampp\htdocs\nuron\resources\views\admin\includes\sidebar.blade.php ENDPATH**/ ?>