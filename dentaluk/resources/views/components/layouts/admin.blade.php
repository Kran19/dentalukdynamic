@props([
    'title' => 'Admin CMS Panel | Icon Dental Wembley',
    'headerTitle' => 'Practice Management Console'
])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    
    <!-- Google Fonts & Bootstrap 5 -->
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        :root {
            --cms-sidebar-width: 270px;
            --cms-bg: #141c13;
            --cms-card-bg: #1e2b1d;
            --cms-gold: #b1986f;
            --cms-gold-hover: #d6c09b;
            --cms-text: #e2e8f0;
        }

        html, body {
            overflow-x: hidden !important;
            max-width: 100vw;
            position: relative;
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
            padding: 22px 20px;
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
            padding: 16px 12px;
            overflow-y: auto;
            flex-grow: 1;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .cms-nav::-webkit-scrollbar {
            display: none;
        }

        .cms-nav-group-title {
            font-size: 10.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: rgba(177, 152, 111, 0.8);
            padding: 14px 14px 6px;
        }

        .cms-nav-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9.5px 14px;
            border-radius: 9px;
            color: rgba(255, 255, 255, 0.75);
            text-decoration: none !important;
            font-size: 13.5px;
            font-weight: 500;
            transition: all 0.2s ease;
            margin-bottom: 2px;
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
            width: 18px;
            text-align: center;
            font-size: 15px;
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
            min-width: 0;
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
            font-size: 12.5px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid rgba(177, 152, 111, 0.2);
            padding: 14px 18px;
        }
        .table-cms td {
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            padding: 14px 18px;
            font-size: 13.5px;
            vertical-align: middle;
        }
        .table-cms tbody tr:hover {
            background: rgba(177, 152, 111, 0.05);
        }
        .table-cms code {
            color: #555;
            background: transparent;
            font-size: 13px;
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

        /* Modal Inputs Global Styling */
        .modal-content .form-control {
            color: #e2e8f0 !important;
        }
        .modal-content .form-control::placeholder {
            color: rgba(255,255,255,0.4) !important;
        }
        .modal-content .form-control:focus {
            background: rgba(255,255,255,0.1) !important;
            color: #ffffff !important;
            box-shadow: 0 0 0 3px rgba(177, 152, 111, 0.25) !important;
            border-color: var(--cms-gold) !important;
        }

        /* Mobile Responsiveness */
        @media (max-width: 991.98px) {
            .cms-sidebar {
                transform: translateX(-100%);
            }
            .cms-sidebar.show {
                transform: translateX(0);
            }
            .cms-main {
                margin-left: 0;
                width: 100%;
            }
            .sidebar-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.6);
                z-index: 1025;
                backdrop-filter: blur(3px);
            }
            .sidebar-overlay.show {
                display: block;
            }
            .mobile-menu-btn {
                display: block !important;
            }
            .cms-header {
                padding: 0 15px;
            }
            .cms-body {
                padding: 15px;
            }
            
            /* Responsive Table Cards */
            .table-mobile-cards, .table-mobile-cards tbody, .table-mobile-cards tr, .table-mobile-cards td {
                display: block;
                width: 100%;
            }
            .table-mobile-cards thead {
                display: none;
            }
            .table-mobile-cards tr {
                margin-bottom: 16px;
                background: #e2e8f0;
                border: 1px solid rgba(177, 152, 111, 0.4);
                border-radius: 12px;
                overflow: visible;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            .table-mobile-cards tr:hover,
            .table-mobile-cards tr:active,
            .table-mobile-cards tr:focus {
                background: #e2e8f0 !important;
            }
            .table-mobile-cards td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                border-bottom: 1px solid rgba(0, 0, 0, 0.08);
                padding: 12px 16px !important;
                text-align: right;
                background: transparent !important;
                color: #111 !important;
            }
            .table-mobile-cards td:last-child {
                border-bottom: none;
            }
            .table-mobile-cards td::before {
                content: attr(data-label);
                font-weight: 600;
                color: #856d45;
                text-transform: uppercase;
                font-size: 11.5px;
                letter-spacing: 0.5px;
                text-align: left;
                padding-right: 15px;
                flex-shrink: 0;
            }
        }
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: var(--cms-gold);
            font-size: 22px;
            padding: 0;
            margin-right: 15px;
        }
    </style>
</head>
<body>

    <!-- Mobile Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    <aside class="cms-sidebar">
        <a href="{{ route('admin.dashboard') }}" class="cms-brand">
            <i class="fa-solid fa-tooth fs-3 text-warning"></i>
            <div>
                <div class="cms-brand-text">ICON DENTAL</div>
                <div class="text-white-50" style="font-size: 11px; letter-spacing: 1px;">PAGE-BASED CMS</div>
            </div>
        </a>

        <nav class="cms-nav">
            <!-- MAIN CONSOLE -->
            <div class="cms-nav-group-title">MAIN CONSOLE</div>
            <a href="{{ route('admin.dashboard') }}" class="cms-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-gauge"></i> Dashboard
            </a>

            <!-- WEBSITE CMS -->
            <div class="cms-nav-group-title">🌐 WEBSITE CMS</div>
            <a href="{{ route('admin.pages.index') }}" class="cms-nav-link {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">
                <i class="fa-regular fa-file-code"></i> Page Sections CMS
            </a>
            <a href="{{ route('admin.treatments.index') }}" class="cms-nav-link {{ request()->routeIs('admin.treatments.*') ? 'active' : '' }}">
                <i class="fa-solid fa-tooth"></i> Treatments CMS
            </a>
            <a href="{{ route('admin.legal.index') }}" class="cms-nav-link {{ request()->routeIs('admin.legal.*') ? 'active' : '' }}">
                <i class="fa-solid fa-scale-balanced"></i> Legal & Compliance
            </a>

            <!-- CONTENT LIBRARY -->
            <div class="cms-nav-group-title">📚 CONTENT LIBRARY</div>
            <a href="{{ route('admin.media.index') }}" class="cms-nav-link {{ request()->routeIs('admin.media.*') ? 'active' : '' }}">
                <i class="fa-regular fa-images"></i> Media Library
            </a>
            <a href="{{ route('admin.team.index') }}" class="cms-nav-link {{ request()->routeIs('admin.team.*') ? 'active' : '' }}">
                <i class="fa-solid fa-user-doctor"></i> Dental Staff
            </a>
            <a href="{{ route('admin.fees.index') }}" class="cms-nav-link {{ request()->routeIs('admin.fees.*') ? 'active' : '' }}">
                <i class="fa-solid fa-receipt"></i> Fee Guide & Rates
            </a>
            <a href="{{ route('admin.stories.index') }}" class="cms-nav-link {{ request()->routeIs('admin.stories.*') ? 'active' : '' }}">
                <i class="fa-solid fa-wand-magic-sparkles"></i> Smile Stories
            </a>

            <!-- PATIENT MANAGEMENT -->
            <div class="cms-nav-group-title">📋 PATIENT MANAGEMENT</div>
            <a href="{{ route('admin.appointments.index') }}" class="cms-nav-link {{ request()->routeIs('admin.appointments.*') ? 'active' : '' }}">
                <i class="fa-regular fa-calendar-check"></i> Bookings
            </a>
            <a href="{{ route('admin.referrals.index') }}" class="cms-nav-link {{ request()->routeIs('admin.referrals.*') ? 'active' : '' }}">
                <i class="fa-solid fa-file-medical"></i> Dentist Referrals
            </a>

            <!-- SYSTEM & ADMIN -->
            <div class="cms-nav-group-title">⚙️ SYSTEM & ADMIN</div>
            <a href="{{ route('admin.settings.index') }}" class="cms-nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <i class="fa-solid fa-sliders"></i> Global Settings
            </a>
        </nav>

        <div class="p-3 border-top border-secondary border-opacity-25">
            <div class="d-flex align-items-center justify-content-between text-white-50 small">
                <span>Version 2.0 (Page-Based CMS)</span>
                <span class="badge bg-success">Active</span>
            </div>
        </div>
    </aside>

    <!-- Main Section -->
    <div class="cms-main">
        <!-- Top Header -->
        <header class="cms-header">
            <div class="d-flex align-items-center">
                <button class="mobile-menu-btn" id="mobileMenuBtn">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <h5 class="mb-0 text-gold font-serif fw-bold" style="color: #d6c09b; font-size: 1.1rem;">{{ $headerTitle }}</h5>
            </div>
            
            <div class="d-flex align-items-center gap-2 gap-sm-3">
                <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-warning btn-sm rounded-pill px-3 d-none d-md-inline-flex align-items-center">
                    <i class="fa-solid fa-globe me-1"></i> View Live Site
                </a>

                <!-- User Profile Dropdown -->
                <div class="dropdown">
                    <button class="btn btn-dark btn-sm dropdown-toggle rounded-pill px-2 px-sm-3 border border-secondary" type="button" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-user-circle text-gold"></i> <span class="d-none d-sm-inline ms-1">{{ Auth::user()->name ?? 'Administrator' }}</span>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.querySelector('.cms-sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const menuBtn = document.getElementById('mobileMenuBtn');

            function toggleSidebar() {
                sidebar.classList.toggle('show');
                overlay.classList.toggle('show');
            }

            if (menuBtn && overlay && sidebar) {
                menuBtn.addEventListener('click', toggleSidebar);
                overlay.addEventListener('click', toggleSidebar);
            }
        });
    </script>
</body>
</html>
