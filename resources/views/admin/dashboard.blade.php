@extends('admin.layouts.app')

@section('title', __('messages.dashboard'))

@section('content')

{{-- Page Header --}}
<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">{{ __('messages.dashboard') }}</h1>
        <p class="page-sub">{{ __('messages.welcome_back') }}, {{ auth('admin')->user()->name }}</p>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">{{ __('messages.dashboard') }}</li>
        </ol>
    </nav>
</div>

{{-- Flash Message --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

{{-- Stat Cards --}}
<div class="row g-3 mb-4">

    <div class="col-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#eff6ff;color:#2563eb">
                <i class="bi bi-calendar-check"></i>
            </div>
            <div class="stat-value">{{ number_format($stats['new_appointments']) }}</div>
            <div class="stat-label">{{ __('messages.new_appointments') }}</div>
        </div>
    </div>

    <div class="col-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#f0fdf4;color:#059669">
                <i class="bi bi-person-badge"></i>
            </div>
            <div class="stat-value">{{ number_format($stats['total_doctors']) }}</div>
            <div class="stat-label">{{ __('messages.total_doctors') }}</div>
        </div>
    </div>

    <div class="col-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#faf5ff;color:#7c3aed">
                <i class="bi bi-geo-alt"></i>
            </div>
            <div class="stat-value">{{ number_format($stats['total_branches']) }}</div>
            <div class="stat-label">{{ __('messages.total_branches') }}</div>
        </div>
    </div>

    <div class="col-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#fef2f2;color:#dc2626">
                <i class="bi bi-envelope"></i>
            </div>
            <div class="stat-value">{{ number_format($stats['unread_messages']) }}</div>
            <div class="stat-label">{{ __('messages.unread_messages') }}</div>
        </div>
    </div>

</div>

{{-- Main content row --}}
<div class="row g-3 mb-3">

    <div class="col-12 col-xl-8">
        <div class="panel-card h-100">
            <div class="panel-card-header">
                <h2 class="panel-card-title">{{ __('messages.recent_appointments') }}</h2>
                <a href="{{ route('admin.appointments.index') }}" class="btn-outline-sm">{{ __('messages.view_all') }}</a>
            </div>
            <div class="panel-card-body p-0">
                <div style="overflow-x:auto">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>{{ __('messages.patient') }}</th>
                                <th>{{ __('messages.phone') }}</th>
                                <th>{{ __('messages.branch') }}</th>
                                <th>{{ __('messages.date') }}</th>
                                <th>{{ __('messages.Status') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentAppointments as $appointment)
                            <tr>
                                <td style="font-weight:500">{{ $appointment->name }}</td>
                                <td style="color:var(--muted)" dir="ltr">{{ $appointment->phone }}</td>
                                <td style="color:var(--muted)">{{ $appointment->branch->name ?? '—' }}</td>
                                <td style="color:var(--muted)">{{ $appointment->preferred_date->format('Y-m-d') }}</td>
                                <td><span class="badge bg-secondary">{{ $appointment->status }}</span></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-4" style="color:var(--muted)">{{ __('messages.no_appointments_yet') }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-xl-4">
        <div class="panel-card h-100">
            <div class="panel-card-header">
                <h2 class="panel-card-title">{{ __('messages.new_messages') }}</h2>
                <a href="{{ route('admin.contact_messages.index') }}" class="btn-outline-sm">{{ __('messages.view_all') }}</a>
            </div>
            <div class="panel-card-body">
                @forelse($recentContacts as $msg)
                <div class="activity-item">
                    <div class="activity-dot" style="background:#eff6ff;color:#2563eb">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-title">{{ $msg->first_name }} {{ $msg->last_name }}</div>
                        <div class="activity-time">{{ Str::limit($msg->subject, 40) }} · {{ $msg->created_at->diffForHumans() }}</div>
                    </div>
                </div>
                @empty
                <p class="text-center py-3" style="color:var(--muted);font-size:.85rem">{{ __('messages.no_new_messages') }}</p>
                @endforelse
            </div>
        </div>
    </div>

</div>

{{-- Quick actions --}}
<div class="row g-3">
    <div class="col-12">
        <div class="panel-card">
            <div class="panel-card-header">
                <h2 class="panel-card-title">{{ __('messages.quick_actions') }}</h2>
            </div>
            <div class="panel-card-body">
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('admin.doctors.create') }}" class="btn-outline-sm">
                        <i class="bi bi-person-plus"></i> {{ __('messages.add_doctor') }}
                    </a>
                    <a href="{{ route('admin.services.create') }}" class="btn-outline-sm">
                        <i class="bi bi-heart-pulse"></i> {{ __('messages.add_service') }}
                    </a>
                    <a href="{{ route('admin.articles.create') }}" class="btn-outline-sm">
                        <i class="bi bi-journal-text"></i> {{ __('messages.add_article') }}
                    </a>
                    <a href="{{ route('admin.contact_messages.index') }}" class="btn-outline-sm">
                        <i class="bi bi-envelope"></i> {{ __('messages.view_messages') }}
                        @if($stats['unread_messages'] > 0)
                            <span class="pill pill-warning ms-1">{{ $stats['unread_messages'] }}</span>
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
