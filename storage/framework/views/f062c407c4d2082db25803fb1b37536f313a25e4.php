<aside class="sidebar" id="sidebar">

    
    <div class="sidebar-brand">
        <div class="brand-icon">
            <i class="bi bi-heart-pulse-fill"></i>
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

        <div class="nav-label"><?php echo e(__('messages.bookings')); ?></div>
        <ul>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.appointments.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.appointments.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-calendar-check"></i>
                    <span><?php echo e(__('messages.appointments')); ?></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.contact_messages.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.contact_messages.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-envelope"></i>
                    <span><?php echo e(__('messages.contact_messages')); ?></span>
                </a>
            </li>
        </ul>

        <div class="nav-label"><?php echo e(__('messages.content')); ?></div>
        <ul>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.doctors.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.doctors.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-person-badge"></i>
                    <span><?php echo e(__('messages.doctors')); ?></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.services.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.services.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-heart-pulse"></i>
                    <span><?php echo e(__('messages.services')); ?></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.branches.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.branches.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-geo-alt"></i>
                    <span><?php echo e(__('messages.branches')); ?></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.articles.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.articles.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-journal-text"></i>
                    <span><?php echo e(__('messages.articles')); ?></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.testimonials.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.testimonials.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-chat-quote"></i>
                    <span><?php echo e(__('messages.testimonials')); ?></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.faqs.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.faqs.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-question-circle"></i>
                    <span><?php echo e(__('messages.faqs')); ?></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.insurance-companies.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.insurance-companies.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-shield-check"></i>
                    <span><?php echo e(__('messages.insurance_companies')); ?></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.videos.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.videos.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-play-circle"></i>
                    <span><?php echo e(__('messages.videos')); ?></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.career-jobs.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.career-jobs.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-briefcase"></i>
                    <span><?php echo e(__('messages.career_jobs')); ?></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.stats.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.stats.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-graph-up"></i>
                    <span><?php echo e(__('messages.stats')); ?></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.banners.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.banners.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-images"></i>
                    <span><?php echo e(__('messages.banners')); ?></span>
                </a>
            </li>
        </ul>

        <div class="nav-label"><?php echo e(__('messages.system')); ?></div>
        <ul>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.employee.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.employee.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-people"></i>
                    <span><?php echo e(__('messages.Employee')); ?></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.role.index')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.role.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-shield-check"></i>
                    <span><?php echo e(__('messages.roles_permissions')); ?></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.site-settings.edit')); ?>"
                    class="nav-link <?php echo e(request()->routeIs('admin.site-settings.*') ? 'active' : ''); ?>">
                    <i class="nav-icon bi bi-gear"></i>
                    <span><?php echo e(__('messages.site_settings')); ?></span>
                </a>
            </li>
        </ul>

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
<?php /**PATH C:\xampp\htdocs\nuron\resources\views/admin/includes/sidebar.blade.php ENDPATH**/ ?>