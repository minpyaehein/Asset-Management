<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Golden Pride')</title>

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @stack('styles')
</head>

<body data-agent-edit="@yield('agent-edit', 'no')" data-page="@yield('page', '')">
    <div class="layout">
        <aside class="sidebar">
            <a class="brand" href="{{ route('dashboard') }}">
                <img src="{{ asset('uploads/logo.png') }}" alt="G" width="25%">
                <span>
                    Golden Pride
                    <small>ASSET MANAGEMENT</small>
                </span>
            </a>

            <nav>
                <div class="nav-group">
                    <div class="nav-caption">Overview</div>
                    <div class="nav-list">
                        <a class="nav-link @yield('nav-dashboard')" data-nav="dashboard" href="{{ route('dashboard') }}">
                            <span class="nav-icon">▦</span>
                            Dashboard
                        </a>
                    </div>
                </div>

                <div class="nav-group">
                    <div class="nav-caption">Inventory</div>
                    <div class="nav-list">
                        <a class="nav-link @yield('nav-assets')" data-nav="assets" href="{{ route('assets') }}">
                            <span class="nav-icon">▣</span>
                            Assets &amp; Hardware
                        </a>

                        @if (auth()->user()->isAdmin())
                            <a class="nav-link @yield('nav-bulk-asset-import')" data-nav="bulk-asset-import"
                                href="{{ route('bulk-asset-import') }}">
                                <span class="nav-icon">⇧</span>
                                Bulk Asset Import
                            </a>

                            <a class="nav-link @yield('nav-employees')" data-nav="employees" href="{{ route('employees') }}">
                                <span class="nav-icon">♙</span>
                                Employees
                            </a>
                        @endif

                        <a class="nav-link @yield('nav-checkin-checkout')" data-nav="checkin-checkout"
                            href="{{ route('checkin-checkout') }}">
                            <span class="nav-icon">⇄</span>
                            Check-in / Check-out
                        </a>
                    </div>
                </div>

                <div class="nav-group">
                    <div class="nav-caption">Software</div>
                    <div class="nav-list">
                        <a class="nav-link @yield('nav-software-management')" data-nav="software-management"
                            href="{{ route('software-management') }}#licenses">
                            <span class="nav-icon">▤</span>
                            Software &amp; Warranty
                        </a>
                    </div>
                </div>

                <div class="nav-group">
                    <div class="nav-caption">Operations</div>
                    <div class="nav-list">
                        <a class="nav-link @yield('nav-service-desk')" data-nav="service-desk"
                            href="{{ route('service-desk') }}">
                            <span class="nav-icon">◉</span>
                            Service Desk
                        </a>

                        <a class="nav-link @yield('nav-asset-transfer')" data-nav="asset-transfer"
                            href="{{ route('asset-transfer') }}">
                            <span class="nav-icon">⇆</span>
                            Asset Transfer
                        </a>

                        <a class="nav-link @yield('nav-acknowledgement')" data-nav="acknowledgement"
                            href="{{ route('acknowledgement') }}">
                            <span class="nav-icon">✓</span>
                            Acknowledgement
                        </a>

                        <a class="nav-link @yield('nav-asset-disposal')" data-nav="asset-disposal"
                            href="{{ route('asset-disposal') }}">
                            <span class="nav-icon">⌫</span>
                            Asset Disposal
                        </a>
                    </div>
                </div>

                <div class="nav-group">
                    <div class="nav-caption">Maintenance</div>
                    <div class="nav-list">
                        <a class="nav-link @yield('nav-maintenance-center')" data-nav="maintenance-center"
                            href="{{ route('maintenance-center') }}#planner">
                            <span class="nav-icon">↻</span>
                            Maintenance Center
                        </a>
                    </div>
                </div>

                <div class="nav-group">
                    <div class="nav-caption">Insights</div>
                    <div class="nav-list">
                        @if (auth()->user()->isAdmin())
                            <a class="nav-link @yield('nav-reports')" data-nav="reports" href="{{ route('reports') }}">
                                <span class="nav-icon">▥</span>
                                Reports &amp; Analytics
                            </a>
                        @endif

                        <a class="nav-link @yield('nav-notifications')" data-nav="notifications"
                            href="{{ route('notifications') }}">
                            <span class="nav-icon">♢</span>
                            Notifications
                        </a>

                        @if (auth()->user()->isAdmin())
                            <a class="nav-link @yield('nav-audit-logs')" data-nav="audit-logs"
                                href="{{ route('audit-logs') }}">
                                <span class="nav-icon">☷</span>
                                Audit Logs
                            </a>
                        @endif
                    </div>
                </div>

                @if (auth()->user()->isAdmin())
                    <div class="nav-group">
                        <div class="nav-caption">Administration</div>
                        <div class="nav-list">
                            <a class="nav-link @yield('nav-user-management')" data-nav="user-management"
                                href="{{ route('user-management') }}">
                                <span class="nav-icon">♙</span>
                                User Management
                            </a>

                            <a class="nav-link @yield('nav-role-management')" data-nav="role-management"
                                href="{{ route('role-management') }}">
                                <span class="nav-icon">⚿</span>
                                Role Management
                            </a>
                        </div>
                    </div>
                @endif
            </nav>

            <div class="side-bottom">

                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button class="nav-link logout-btn" type="submit">
                        <span class="nav-icon">↪</span>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <main class="main">
            <header class="topbar">
                <div class="crumb">
                    @yield('breadcrumb', 'Workspace')
                </div>

                <div class="topbar-right">
                    @yield('topbar-actions')

                    <div class="user-chip">
                        <div class="avatar">
                            {{ strtoupper(substr(auth()->user()->user_name, 0, 1)) }}
                        </div>

                        <div>
                            <strong>{{ auth()->user()->user_name }}</strong>
                            <small>{{ auth()->user()->role }}</small>
                        </div>
                    </div>
                </div>
            </header>

            <section class="content">

                @yield('content')
            </section>
        </main>
    </div>

    @stack('scripts')
</body>

</html>
