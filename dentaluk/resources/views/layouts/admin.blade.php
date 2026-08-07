<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Admin CMS Panel | Icon Dental Wembley' }}</title>
    
    <!-- Google Fonts & Bootstrap 5 -->
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        :root {
            --cms-sidebar-width: 260px;
            --cms-bg: #141c13;
            --cms-card-bg: #1e2b1d;
            --cms-gold: #b1986f;
            --cms-gold-hover: #d6c09b;
            --cms-text: #e2e8f0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--cms-bg);
            color: var(--cms-text);
            min-height: 100vh;
            display: flex;
            margin: 0;
        }

        /* Sidebar Styles */
        .cms-sidebar {
            width: var(--cms-sidebar-width);
            background: #111a10;
            border-right: 1px solid rgba(177, 152, 111, 0.2);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 1030;
            transition: all 0.3s ease;
        }

        .cms-brand {
            padding: 24px 20px;
            border-bottom: 1px solid rgba(177, 152, 111, 0.15);
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none !important;
        }

        .cms-brand-text {
            font-family: 'Cormorant Garamond', serif;
            font-size: 22px;
            font-weight: 700;
            color: var(--cms-gold);
            line-height: 1.1;
        }

        .cms-nav {
            padding: 20px 12px;
            overflow-y: auto;
            flex-grow: 1;
        }

        .cms-nav-group-title {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: rgba(255, 255, 255, 0.4);
            padding: 12px 14px 6px;
        }

        .cms-nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 14px;
            border-radius: 10px;
            color: rgba(255, 255, 255, 0.75);
            text-decoration: none !important;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.25s ease;
            margin-bottom: 4px;
        }

        .cms-nav-link:hover, .cms-nav-link.active {
            background: rgba(177, 152, 111, 0.15);
            color: var(--cms-gold-hover);
            transform: translateX(3px);
        }

        .cms-nav-link.active {
            border-left: 3px solid var(--cms-gold);
            font-weight: 600;
        }

        .cms-nav-link i {
            width: 20px;
            text-align: center;
            font-size: 16px;
            color: var(--cms-gold);
        }

        /* Main Content Layout */
        .cms-main {
            margin-left: var(--cms-sidebar-width);
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            width: calc(100% - var(--cms-sidebar-width));
        }

        .cms-header {
            height: 70px;
            background: rgba(17, 26, 16, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(177, 152, 111, 0.15);
            padding: 0 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 1020;
        }

        .cms-body {
            padding: 30px;
            flex-grow: 1;
        }

        .cms-card {
            background: var(--cms-card-bg);
            border: 1px solid rgba(177, 152, 111, 0.2);
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            margin-bottom: 24px;
        }

        .cms-card-header {
            padding: 20px 24px;
            border-bottom: 1px solid rgba(177, 152, 111, 0.15);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .cms-card-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 22px;
            font-weight: 600;
            color: var(--cms-gold);
            margin: 0;
        }

        .cms-card-body {
            padding: 24px;
        }

        /* Custom Table */
        .table-cms {
            color: var(--cms-text);
            margin: 0;
        }
        .table-cms th {
            background: rgba(0, 0, 0, 0.3);
            color: var(--cms-gold);
            font-weight: 600;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid rgba(177, 152, 111, 0.2);
            padding: 14px 18px;
        }
        .table-cms td {
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            padding: 14px 18px;
            font-size: 14px;
            vertical-align: middle;
        }
        .table-cms tbody tr:hover {
            background: rgba(177, 152, 111, 0.05);
        }

        /* Buttons */
        .btn-gold {
            background: var(--cms-gold);
            color: #111a10;
            font-weight: 600;
            border: none;
            padding: 9px 20px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .btn-gold:hover {
            background: var(--cms-gold-hover);
            color: #111a10;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <aside class="cms-sidebar">
        <a href="{{ route('admin.dashboard') }}" class="cms-brand">
            <i class="fa-solid fa-tooth fs-3 text-warning"></i>
            <div>
                <div class="cms-brand-text">ICON DENTAL</div>
                <div class="text-white-50" style="font-size: 11px; letter-spacing: 1px;">PRACTICE CMS</div>
            </div>
        </a>

        <nav class="cms-nav">
            <div class="cms-nav-group-title">Main Dashboard</div>
            <a href="{{ route('admin.dashboard') }}" class="cms-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-gauge"></i> Dashboard
            </a>

            <div class="cms-nav-group-title">Patient Management</div>
            <a href="{{ route('admin.appointments.index') }}" class="cms-nav-link {{ request()->routeIs('admin.appointments.*') ? 'active' : '' }}">
                <i class="fa-regular fa-calendar-check"></i> Appointments
            </a>
            <a href="{{ route('admin.referrals.index') }}" class="cms-nav-link {{ request()->routeIs('admin.referrals.*') ? 'active' : '' }}">
                <i class="fa-solid fa-file-medical"></i> Dentist Referrals
            </a>

            <div class="cms-nav-group-title">Website Content CMS</div>
            <a href="{{ route('admin.team.index') }}" class="cms-nav-link {{ request()->routeIs('admin.team.*') ? 'active' : '' }}">
                <i class="fa-solid fa-user-doctor"></i> Dental Team
            </a>
            <a href="{{ route('admin.fees.index') }}" class="cms-nav-link {{ request()->routeIs('admin.fees.*') ? 'active' : '' }}">
                <i class="fa-solid fa-receipt"></i> Fee Guide & Rates
            </a>
            <a href="{{ route('admin.settings.index') }}" class="cms-nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <i class="fa-solid fa-sliders"></i> Global Settings
            </a>
        </nav>

        <div class="p-3 border-top border-secondary border-opacity-25">
            <div class="d-flex align-items-center justify-content-between text-white-50 small">
                <span>Version 2.0 (Laravel 12)</span>
                <span class="badge bg-success">Active</span>
            </div>
        </div>
    </aside>

    <!-- Main Section -->
    <div class="cms-main">
        <!-- Top Header -->
        <header class="cms-header">
            <div>
                <h5 class="mb-0 text-gold font-serif fw-bold" style="color: #d6c09b;">{{ $headerTitle ?? 'Practice Management Console' }}</h5>
            </div>
            
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-warning btn-sm rounded-pill px-3">
                    <i class="fa-solid fa-globe me-1"></i> View Live Site
                </a>

                <!-- User Profile Dropdown -->
                <div class="dropdown">
                    <button class="btn btn-dark btn-sm dropdown-toggle rounded-pill px-3 border border-secondary" type="button" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-user-circle me-1 text-gold"></i> {{ Auth::user()->name ?? 'Administrator' }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark shadow">
                        <li><span class="dropdown-header">{{ Auth::user()->email ?? 'admin@icondental' }}</span></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <!-- Main Body Content -->
        <div class="cms-body">
            @if (session('success'))
                <div class="alert alert-success border-0 rounded-3 p-3 mb-4" style="background: rgba(40, 167, 69, 0.2); color: #85e39d;">
                    <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger border-0 rounded-3 p-3 mb-4" style="background: rgba(220, 53, 69, 0.2); color: #ff8b94;">
                    <i class="fa-solid fa-triangle-exclamation me-2"></i> {{ session('error') }}
                </div>
            @endif

            {{ $slot }}
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
