@extends('layouts.master')

@section('title')
    {{ auth()->user()->role }} Dashboard · Golden Pride
@endsection

@section('page', 'dashboard')
@section('agent-edit', 'no')
@section('nav-dashboard', 'active')

@section('breadcrumb')
    Workspace / {{ auth()->user()->role }} Dashboard
@endsection

@section('content')
    <div class="page-head">
        <div>
            <div class="eyebrow">Overview</div>

            <h1>{{ auth()->user()->role }} Dashboard</h1>

            <p>
                @if (auth()->user()->isAdmin())
                    Inventory overview and administration shortcuts.
                @else
                    Inventory overview and asset operation shortcuts.
                @endif
            </p>
        </div>

        <div class="button-row">
            <a class="btn primary" href="{{ route('assets') }}">
                ＋ View Inventory
            </a>

            @if (auth()->user()->isAdmin())
                <a class="btn" href="{{ route('reports') }}">
                    Open Reports
                </a>
            @endif
        </div>
    </div>

    <div class="stats dashboard-section" data-section="inventory">
        <div class="stat dashboard-search-item">
            <div class="stat-top">
                Inventory
                <span class="stat-icon">▣</span>
            </div>
            <div class="stat-value">06</div>
            <div class="stat-foot">Sample assets in this demo</div>
        </div>

        <div class="stat dashboard-search-item">
            <div class="stat-top">
                Available
                <span class="stat-icon">✓</span>
            </div>
            <div class="stat-value">03</div>
            <div class="stat-foot">Ready to allocate</div>
        </div>

        <div class="stat dashboard-search-item">
            <div class="stat-top">
                Assigned
                <span class="stat-icon">♙</span>
            </div>
            <div class="stat-value">02</div>
            <div class="stat-foot">Currently in use</div>
        </div>

        <div class="stat dashboard-search-item">
            <div class="stat-top">
                Renewals Due
                <span class="stat-icon">◷</span>
            </div>
            <div class="stat-value">01</div>
            <div class="stat-foot">Review agreements</div>
        </div>
    </div>

    <div class="panel dashboard-section dashboard-search-item" data-section="activity">
        <div class="panel-head">
            <div>
                <h2>Quick Access</h2>
                <p>Commonly used modules</p>
            </div>
        </div>

        <div class="panel-body">
            <div class="quick-grid">
                <a class="quick-link dashboard-search-item" data-section="inventory" href="{{ route('assets') }}">
                    <span class="quick-icon">▣</span>
                    <span>
                        <strong>Assets &amp; Hardware</strong>
                        <small>Open module →</small>
                    </span>
                </a>

                @if (auth()->user()->isAdmin())
                    <a class="quick-link dashboard-search-item" data-section="inventory" href="{{ route('employees') }}">
                        <span class="quick-icon">♙</span>
                        <span>
                            <strong>Employees</strong>
                            <small>Open module →</small>
                        </span>
                    </a>
                @endif

                <a class="quick-link dashboard-search-item" data-section="inventory" href="{{ route('checkin-checkout') }}">
                    <span class="quick-icon">⇄</span>
                    <span>
                        <strong>Check-in / Check-out</strong>
                        <small>Open module →</small>
                    </span>
                </a>

                <a class="quick-link dashboard-search-item" data-section="software"
                    href="{{ route('software-management') }}#licenses">
                    <span class="quick-icon">▤</span>
                    <span>
                        <strong>Software &amp; Warranty</strong>
                        <small>Open module →</small>
                    </span>
                </a>

                <a class="quick-link dashboard-search-item" data-section="activity" href="{{ route('service-desk') }}">
                    <span class="quick-icon">◉</span>
                    <span>
                        <strong>Service Desk</strong>
                        <small>Open module →</small>
                    </span>
                </a>

                <a class="quick-link dashboard-search-item" data-section="maintenance"
                    href="{{ route('maintenance-center') }}#planner">
                    <span class="quick-icon">◷</span>
                    <span>
                        <strong>Maintenance Center</strong>
                        <small>Open module →</small>
                    </span>
                </a>

                @if (auth()->user()->isAdmin())
                    <a class="quick-link dashboard-search-item" data-section="activity" href="{{ route('reports') }}">
                        <span class="quick-icon">▥</span>
                        <span>
                            <strong>Reports &amp; Analytics</strong>
                            <small>Open module →</small>
                        </span>
                    </a>

                    <a class="quick-link dashboard-search-item" data-section="activity"
                        href="{{ route('user-management') }}">
                        <span class="quick-icon">♙</span>
                        <span>
                            <strong>User Management</strong>
                            <small>Open module →</small>
                        </span>
                    </a>

                    <a class="quick-link dashboard-search-item" data-section="activity"
                        href="{{ route('role-management') }}">
                        <span class="quick-icon">⚿</span>
                        <span>
                            <strong>Role Management</strong>
                            <small>Open module →</small>
                        </span>
                    </a>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('global-search');
            const filterSelect = document.getElementById('record-filter');
            const searchableItems = Array.from(
                document.querySelectorAll('.dashboard-search-item')
            );

            function applyDashboardFilters() {
                const searchValue = (searchInput?.value || '')
                    .trim()
                    .toLowerCase();

                const selectedSection = filterSelect?.value || '';

                searchableItems.forEach(function(item) {
                    const itemText = item.textContent.toLowerCase();
                    const itemSection = item.dataset.section ||
                        item.closest('[data-section]')?.dataset.section || '';

                    const matchesSearch = !searchValue ||
                        itemText.includes(searchValue);

                    const matchesSection = !selectedSection ||
                        itemSection === selectedSection;

                    item.hidden = !(matchesSearch && matchesSection);
                });
            }

            searchInput?.addEventListener('input', applyDashboardFilters);
            filterSelect?.addEventListener('change', applyDashboardFilters);
        });
    </script>
@endpush
