<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frozeria</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,400;0,600;1,400&family=DM+Sans:wght@400;500;600&display=swap"
        rel="stylesheet">
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --green-50: #edfaf3;
            --green-100: #c6f0d9;
            --green-400: #2eb872;
            --green-500: #1d9e5e;
            --green-600: #147a47;
            --green-800: #0a3d24;
            --amber-100: #fef3c7;
            --amber-500: #f59e0b;
            --red-100: #fee2e2;
            --red-500: #ef4444;
            --gray-50: #fafaf9;
            --gray-100: #f4f3f0;
            --gray-200: #e8e6e0;
            --gray-400: #a8a39a;
            --gray-600: #6b6560;
            --gray-900: #1c1917;
            --white: #ffffff;
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.07), 0 1px 2px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.08), 0 2px 4px rgba(0, 0, 0, 0.04);
            --radius: 12px;
            --radius-sm: 8px;
        }

        html,
        body {
            height: 100%;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--gray-100);
            color: var(--gray-900);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ── NAVBAR ── */
        .navbar {
            background: var(--white);
            border-bottom: 1.5px solid var(--gray-200);
            padding: 0 32px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: var(--shadow-sm);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .navbar-brand-icon {
            width: 36px;
            height: 36px;
            background: var(--green-500);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .navbar-brand-icon svg {
            width: 20px;
            height: 20px;
            fill: none;
            stroke: white;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .navbar-brand-text {
            font-family: 'Fraunces', serif;
            font-size: 20px;
            font-weight: 600;
            color: var(--gray-900);
            letter-spacing: -0.3px;
        }

        .navbar-brand-text span {
            color: var(--green-500);
        }

        .navbar-nav {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .navbar-nav a {
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            color: var(--gray-600);
            padding: 8px 14px;
            border-radius: var(--radius-sm);
            transition: background 0.15s, color 0.15s;
        }

        .navbar-nav a:hover {
            background: var(--gray-100);
            color: var(--gray-900);
        }

        .navbar-nav a.active {
            background: var(--green-50);
            color: var(--green-600);
        }

        .navbar-nav a svg {
            width: 16px;
            height: 16px;
            vertical-align: -3px;
            margin-right: 5px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .btn-logout {
            display: flex;
            align-items: center;
            gap: 6px;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            font-weight: 500;
            color: var(--gray-600);
            background: transparent;
            border: 1.5px solid var(--gray-200);
            padding: 7px 14px;
            border-radius: var(--radius-sm);
            cursor: pointer;
            transition: background 0.15s, color 0.15s, border-color 0.15s;
            text-decoration: none;
        }

        .btn-logout:hover {
            background: var(--red-100);
            color: var(--red-500);
            border-color: var(--red-500);
        }

        .btn-logout svg {
            width: 15px;
            height: 15px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        /* ── CONTENT ── */
        .main-wrapper {
            flex: 1;
            padding: 28px 32px;
            max-width: 1280px;
            width: 100%;
            margin: 0 auto;
        }

        /* ── PAGE HEADER (optional helper) ── */
        .page-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            margin-bottom: 24px;
            gap: 16px;
        }

        .page-header h1 {
            font-family: 'Fraunces', serif;
            font-size: 26px;
            font-weight: 600;
            color: var(--gray-900);
            letter-spacing: -0.4px;
        }

        .page-header p {
            font-size: 14px;
            color: var(--gray-400);
            margin-top: 3px;
        }

        /* ── BUTTONS ── */
        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: var(--green-500);
            color: white;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            font-weight: 500;
            padding: 10px 20px;
            border: none;
            border-radius: var(--radius-sm);
            cursor: pointer;
            text-decoration: none;
            transition: background 0.15s, transform 0.1s;
        }

        .btn-primary:hover {
            background: var(--green-600);
        }

        .btn-primary:active {
            transform: scale(0.98);
        }

        .btn-primary svg {
            width: 16px;
            height: 16px;
            stroke: white;
            fill: none;
            stroke-width: 2.5;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        /* ── CARD GRID ── */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 16px;
        }

        .item-card {
            background: var(--white);
            border: 1.5px solid var(--gray-200);
            border-radius: var(--radius);
            overflow: hidden;
            transition: box-shadow 0.2s, transform 0.2s;
            cursor: pointer;
        }

        .item-card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .item-card-thumb {
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .item-card-thumb svg {
            width: 44px;
            height: 44px;
            stroke-width: 1.5;
            stroke-linecap: round;
            stroke-linejoin: round;
            fill: none;
        }

        .item-card-body {
            padding: 12px 14px;
        }

        .item-card-name {
            font-size: 14px;
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 3px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .item-card-stock {
            font-size: 12px;
            color: var(--gray-400);
            margin-bottom: 8px;
        }

        .item-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .item-card-price {
            font-size: 14px;
            font-weight: 600;
            color: var(--green-600);
        }

        /* badges */
        .badge {
            display: inline-block;
            font-size: 11px;
            font-weight: 500;
            padding: 3px 9px;
            border-radius: 20px;
        }

        .badge-ok {
            background: var(--green-50);
            color: var(--green-600);
        }

        .badge-warn {
            background: var(--amber-100);
            color: #92400e;
        }

        .badge-danger {
            background: var(--red-100);
            color: #b91c1c;
        }

        /* ── TABLE ── */
        .table-card {
            background: var(--white);
            border: 1.5px solid var(--gray-200);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }

        .table-card table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        .table-card thead tr {
            background: var(--gray-50);
            border-bottom: 1.5px solid var(--gray-200);
        }

        .table-card thead th {
            text-align: left;
            padding: 12px 16px;
            font-size: 12px;
            font-weight: 600;
            color: var(--gray-400);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .table-card tbody tr {
            border-bottom: 1px solid var(--gray-100);
            transition: background 0.1s;
        }

        .table-card tbody tr:last-child {
            border-bottom: none;
        }

        .table-card tbody tr:hover {
            background: var(--gray-50);
        }

        .table-card tbody td {
            padding: 13px 16px;
            color: var(--gray-900);
        }

        /* ── FORM ── */
        .form-card {
            background: var(--white);
            border: 1.5px solid var(--gray-200);
            border-radius: var(--radius);
            padding: 28px 32px;
            box-shadow: var(--shadow-sm);
            max-width: 560px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--gray-600);
            margin-bottom: 6px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px 14px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            color: var(--gray-900);
            background: var(--white);
            border: 1.5px solid var(--gray-200);
            border-radius: var(--radius-sm);
            outline: none;
            transition: border-color 0.15s, box-shadow 0.15s;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: var(--green-400);
            box-shadow: 0 0 0 3px rgba(46, 184, 114, 0.15);
        }

        .form-group .form-hint {
            font-size: 12px;
            color: var(--gray-400);
            margin-top: 5px;
        }

        /* ── FLASH MESSAGES ── */
        .alert {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 16px;
            border-radius: var(--radius-sm);
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 20px;
        }

        .alert-success {
            background: var(--green-50);
            color: var(--green-600);
            border: 1px solid var(--green-100);
        }

        .alert-danger {
            background: var(--red-100);
            color: #b91c1c;
            border: 1px solid #fecaca;
        }

        .alert svg {
            width: 17px;
            height: 17px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            flex-shrink: 0;
        }

        /* ── SEARCH / FILTER BAR ── */
        .filter-bar {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .search-input-wrap {
            position: relative;
            flex: 1;
            min-width: 200px;
        }

        .search-input-wrap svg {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            stroke: var(--gray-400);
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .search-input-wrap input {
            width: 100%;
            padding: 9px 14px 9px 38px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            color: var(--gray-900);
            background: var(--white);
            border: 1.5px solid var(--gray-200);
            border-radius: var(--radius-sm);
            outline: none;
            transition: border-color 0.15s;
        }

        .search-input-wrap input:focus {
            border-color: var(--green-400);
        }

        /* ── FOOTER ── */
        .site-footer {
            text-align: center;
            padding: 16px 32px;
            font-size: 12px;
            color: var(--gray-400);
            border-top: 1px solid var(--gray-200);
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 640px) {
            .navbar {
                padding: 0 16px;
            }

            .navbar-brand-text {
                font-size: 17px;
            }

            .main-wrapper {
                padding: 20px 16px;
            }

            .card-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>

    {{-- NAVBAR --}}
    <nav class="navbar">

        <a href="{{ route('items.index') }}" class="navbar-brand">
            <div class="navbar-brand-icon">
                {{-- snowflake icon --}}
                <svg viewBox="0 0 24 24">
                    <path d="M12 2v20M2 12h20M4.93 4.93l14.14 14.14M19.07 4.93L4.93 19.07" />
                </svg>
            </div>
            <span class="navbar-brand-text">Froze<span>ria</span></span>
        </a>

        <div class="navbar-nav">
            <a href="{{ route('items.index') }}" class="{{ request()->routeIs('items.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24">
                    <rect x="3" y="3" width="7" height="7" rx="1" />
                    <rect x="14" y="3" width="7" height="7" rx="1" />
                    <rect x="3" y="14" width="7" height="7" rx="1" />
                    <rect x="14" y="14" width="7" height="7" rx="1" />
                </svg>
                Dashboard
            </a>
            <a href="{{ route('kategori.index') }}" class="{{ request()->routeIs('kategori.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24">
                    <path d="M20.59 13.41l-7.17 7.17a2 2 0 01-2.83 0L2 12V2h10l8.59 8.59a2 2 0 010 2.82z" />
                    <circle cx="7" cy="7" r="1" fill="currentColor" />
                </svg>
                Kategori
            </a>
            <a href="{{ route('bantuan.index') }}" class="{{ request()->routeIs('bantuan.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24">
                    <path
                        d="M12 2a10 10 0 100 20A10 10 0 0012 2zm0 15a1 1 0 110-2 1 1 0 010 2zm1-4.5c0 .28-.22.5-.5.5h-1a.5.5 0 01-.5-.5v-.5c0-1.1.9-2 2-2a1 1 0 000-2 1 1 0 00-1 1h-2a3 3 0 116 0c0 1.1-.9 2-2 2v.5z" />
                </svg>
                Bantuan
            </a>
        </div>

        <div class="navbar-right">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout">
                    <svg viewBox="0 0 24 24">
                        <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4" />
                        <polyline points="16 17 21 12 16 7" />
                        <line x1="21" y1="12" x2="9" y2="12" />
                    </svg>
                    Logout
                </button>
            </form>
        </div>

    </nav>

    {{-- MAIN CONTENT --}}
    <main class="main-wrapper">

        {{-- Flash messages --}}
        @if (session('success'))
            <div class="alert alert-success">
                <svg viewBox="0 0 24 24">
                    <path d="M22 11.08V12a10 10 0 11-5.93-9.14" />
                    <polyline points="22 4 12 14.01 9 11.01" />
                </svg>
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                <svg viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" />
                    <line x1="12" y1="8" x2="12" y2="12" />
                    <line x1="12" y1="16" x2="12.01" y2="16" />
                </svg>
                {{ session('error') }}
            </div>
        @endif

        @yield('content')

    </main>

    <footer class="site-footer">
        &copy; {{ date('Y') }} Frozeria &mdash; Sistem Manajemen Stok Makanan
    </footer>

</body>

</html>
