<aside class="sidebar" id="sidebar">

    {{-- Brand --}}
    <div class="sidebar-brand">
        <div class="brand-icon">
            <i class="bi bi-heart-pulse-fill"></i>
        </div>
        <span class="brand-text">{{ __('messages.edu_platform') }}</span>
    </div>

    {{-- Navigation --}}
    <nav class="sidebar-nav">

        <div class="nav-label">{{ __('messages.main') }}</div>
        <ul>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}"
                    class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-speedometer2"></i>
                    <span>{{ __('messages.dashboard') }}</span>
                </a>
            </li>
        </ul>

        <div class="nav-label">{{ __('messages.bookings') }}</div>
        <ul>
            <li class="nav-item">
                <a href="{{ route('admin.appointments.index') }}"
                    class="nav-link {{ request()->routeIs('admin.appointments.*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-calendar-check"></i>
                    <span>{{ __('messages.appointments') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.contact_messages.index') }}"
                    class="nav-link {{ request()->routeIs('admin.contact_messages.*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-envelope"></i>
                    <span>{{ __('messages.contact_messages') }}</span>
                </a>
            </li>
        </ul>

        <div class="nav-label">{{ __('messages.content') }}</div>
        <ul>
            <li class="nav-item">
                <a href="{{ route('admin.doctors.index') }}"
                    class="nav-link {{ request()->routeIs('admin.doctors.*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-person-badge"></i>
                    <span>{{ __('messages.doctors') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.services.index') }}"
                    class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-heart-pulse"></i>
                    <span>{{ __('messages.services') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.branches.index') }}"
                    class="nav-link {{ request()->routeIs('admin.branches.*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-geo-alt"></i>
                    <span>{{ __('messages.branches') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.articles.index') }}"
                    class="nav-link {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-journal-text"></i>
                    <span>{{ __('messages.articles') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.testimonials.index') }}"
                    class="nav-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-chat-quote"></i>
                    <span>{{ __('messages.testimonials') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.faqs.index') }}"
                    class="nav-link {{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-question-circle"></i>
                    <span>{{ __('messages.faqs') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.insurance-companies.index') }}"
                    class="nav-link {{ request()->routeIs('admin.insurance-companies.*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-shield-check"></i>
                    <span>{{ __('messages.insurance_companies') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.videos.index') }}"
                    class="nav-link {{ request()->routeIs('admin.videos.*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-play-circle"></i>
                    <span>{{ __('messages.videos') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.career-jobs.index') }}"
                    class="nav-link {{ request()->routeIs('admin.career-jobs.*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-briefcase"></i>
                    <span>{{ __('messages.career_jobs') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.stats.index') }}"
                    class="nav-link {{ request()->routeIs('admin.stats.*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-graph-up"></i>
                    <span>{{ __('messages.stats') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.banners.index') }}"
                    class="nav-link {{ request()->routeIs('admin.banners.*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-images"></i>
                    <span>{{ __('messages.banners') }}</span>
                </a>
            </li>
        </ul>

        <div class="nav-label">الشات بوت</div>
        <ul>
            <li class="nav-item">
                <a href="{{ route('admin.chatbot.index') }}"
                    class="nav-link {{ request()->routeIs('admin.chatbot.*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-robot"></i>
                    <span>قاعدة معرفة المساعد</span>
                </a>
            </li>
        </ul>

        <div class="nav-label">{{ __('messages.system') }}</div>
        <ul>
            <li class="nav-item">
                <a href="{{ route('admin.employee.index') }}"
                    class="nav-link {{ request()->routeIs('admin.employee.*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-people"></i>
                    <span>{{ __('messages.Employee') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.role.index') }}"
                    class="nav-link {{ request()->routeIs('admin.role.*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-shield-check"></i>
                    <span>{{ __('messages.roles_permissions') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.site-settings.edit') }}"
                    class="nav-link {{ request()->routeIs('admin.site-settings.*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-gear"></i>
                    <span>{{ __('messages.site_settings') }}</span>
                </a>
            </li>
        </ul>

    </nav>

    {{-- Sidebar Footer --}}
    <div class="sidebar-footer">
        <ul>
            <li class="nav-item">
                <a href="{{ route('admin.login.edit', auth('admin')->id()) }}" class="nav-link">
                    <i class="nav-icon bi bi-gear"></i>
                    <span>{{ __('messages.settings') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"
                    onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();">
                    <i class="nav-icon bi bi-box-arrow-right"></i>
                    <span>{{ __('messages.sign_out') }}</span>
                </a>
            </li>
        </ul>
        <button class="sidebar-collapse-btn" id="sidebarCollapseBtn" title="{{ __('messages.collapse_sidebar') }}">
            <i class="bi bi-arrow-bar-left"></i>
        </button>
    </div>

</aside>
