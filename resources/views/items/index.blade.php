@extends('layouts.app')

@section('content')
    <style>
        :root {
            --green-50: #edfaf3;
            --green-100: #c6f0d9;
            --green-400: #2eb872;
            --green-500: #1d9e5e;
            --green-600: #147a47;
            --green-800: #0a3d24;
            --amber-50: #fffbeb;
            --amber-100: #fef3c7;
            --amber-600: #92400e;
            --red-50: #fff5f5;
            --red-100: #fee2e2;
            --red-600: #dc2626;
            --red-700: #b91c1c;
            --blue-50: #eff6ff;
            --blue-100: #dbeafe;
            --blue-600: #1d4ed8;
            --gray-50: #fafaf9;
            --gray-100: #f4f3f0;
            --gray-200: #e8e6e0;
            --gray-400: #a8a39a;
            --gray-600: #6b6560;
            --gray-900: #1c1917;
            --white: #ffffff;
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.07);
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.09);
            --radius: 12px;
            --radius-sm: 8px;
        }

        /* ── STAT CARDS ── */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 14px;
            margin-bottom: 28px;
        }

        .stat-card {
            background: var(--white);
            border: 1.5px solid var(--gray-200);
            border-radius: var(--radius);
            padding: 18px 20px;
            display: flex;
            flex-direction: column;
            gap: 6px;
            box-shadow: var(--shadow-sm);
        }

        .stat-card-icon {
            width: 36px;
            height: 36px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 4px;
        }

        .stat-card-icon svg {
            width: 18px;
            height: 18px;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            fill: none;
        }

        .stat-card-label {
            font-size: 12px;
            font-weight: 500;
            color: var(--gray-400);
            letter-spacing: 0.03em;
            text-transform: uppercase;
        }

        .stat-card-value {
            font-family: 'Fraunces', serif;
            font-size: 30px;
            font-weight: 600;
            color: var(--gray-900);
            line-height: 1;
        }

        .stat-card-sub {
            font-size: 12px;
            color: var(--gray-400);
        }

        /* ── PAGE HEADER ── */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 12px;
        }

        .page-header-title {
            font-family: 'Fraunces', serif;
            font-size: 22px;
            font-weight: 600;
            color: var(--gray-900);
            letter-spacing: -0.3px;
        }

        /* ── FILTER BAR ── */
        .filter-bar {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 18px;
            flex-wrap: wrap;
        }

        .search-wrap {
            position: relative;
            flex: 1;
            min-width: 200px;
            max-width: 320px;
        }

        .search-wrap svg {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            width: 15px;
            height: 15px;
            stroke: var(--gray-400);
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            pointer-events: none;
        }

        .search-wrap input {
            width: 100%;
            padding: 9px 14px 9px 36px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            color: var(--gray-900);
            background: var(--white);
            border: 1.5px solid var(--gray-200);
            border-radius: var(--radius-sm);
            outline: none;
            transition: border-color .15s, box-shadow .15s;
        }

        .search-wrap input:focus {
            border-color: var(--green-400);
            box-shadow: 0 0 0 3px rgba(46, 184, 114, .15);
        }

        .search-wrap input::placeholder {
            color: var(--gray-400);
        }

        .filter-select {
            padding: 9px 14px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            color: var(--gray-900);
            background: var(--white);
            border: 1.5px solid var(--gray-200);
            border-radius: var(--radius-sm);
            outline: none;
            cursor: pointer;
            transition: border-color .15s;
        }

        .filter-select:focus {
            border-color: var(--green-400);
        }

        /* ── BUTTONS ── */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            font-weight: 500;
            padding: 8px 16px;
            border-radius: var(--radius-sm);
            cursor: pointer;
            text-decoration: none;
            border: 1.5px solid transparent;
            transition: background .15s, border-color .15s, transform .1s;
            white-space: nowrap;
        }

        .btn:active {
            transform: scale(.97);
        }

        .btn svg {
            width: 14px;
            height: 14px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .btn-green {
            background: var(--green-500);
            color: var(--white);
            border-color: var(--green-500);
        }

        .btn-green:hover {
            background: var(--green-600);
            border-color: var(--green-600);
        }

        .btn-blue {
            background: var(--blue-50);
            color: var(--blue-600);
            border-color: var(--blue-100);
        }

        .btn-blue:hover {
            background: var(--blue-100);
        }

        .btn-amber {
            background: var(--amber-50);
            color: var(--amber-600);
            border-color: var(--amber-100);
        }

        .btn-amber:hover {
            background: var(--amber-100);
        }

        .btn-red {
            background: var(--red-50);
            color: var(--red-700);
            border-color: var(--red-100);
        }

        .btn-red:hover {
            background: var(--red-100);
        }

        /* ── TABLE ── */
        .table-wrap {
            background: var(--white);
            border: 1.5px solid var(--gray-200);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        .data-table thead tr {
            background: var(--gray-50);
            border-bottom: 1.5px solid var(--gray-200);
        }

        .data-table thead th {
            padding: 11px 16px;
            font-size: 11px;
            font-weight: 600;
            color: var(--gray-400);
            text-transform: uppercase;
            letter-spacing: 0.06em;
            text-align: left;
            white-space: nowrap;
        }

        .data-table tbody tr {
            border-bottom: 1px solid var(--gray-100);
            transition: background .1s;
        }

        .data-table tbody tr:last-child {
            border-bottom: none;
        }

        .data-table tbody tr:hover {
            background: var(--gray-50);
        }

        .data-table tbody td {
            padding: 12px 16px;
            color: var(--gray-900);
            vertical-align: middle;
        }

        .item-thumb {
            width: 56px;
            height: 56px;
            object-fit: cover;
            border-radius: 8px;
            border: 1.5px solid var(--gray-200);
        }

        .item-thumb-placeholder {
            width: 56px;
            height: 56px;
            background: var(--gray-100);
            border-radius: 8px;
            border: 1.5px solid var(--gray-200);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .item-thumb-placeholder svg {
            width: 22px;
            height: 22px;
            stroke: var(--gray-400);
            fill: none;
            stroke-width: 1.5;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .item-name {
            font-weight: 600;
            color: var(--gray-900);
        }

        .item-sku {
            font-size: 12px;
            color: var(--gray-400);
            margin-top: 2px;
        }

        .kode-badge {
            display: inline-block;
            font-size: 12px;
            font-weight: 600;
            font-family: 'DM Mono', 'Courier New', monospace;
            padding: 3px 10px;
            background: var(--gray-100);
            color: var(--gray-600);
            border: 1px solid var(--gray-200);
            border-radius: 6px;
            letter-spacing: 0.04em;
        }

        .badge {
            display: inline-block;
            font-size: 12px;
            font-weight: 600;
            padding: 3px 10px;
            border-radius: 20px;
        }

        .badge-ok {
            background: var(--green-50);
            color: var(--green-600);
        }

        .badge-warn {
            background: var(--amber-50);
            color: var(--amber-600);
        }

        .badge-danger {
            background: var(--red-50);
            color: var(--red-700);
        }

        .aksi-group {
            display: flex;
            align-items: center;
            gap: 6px;
            flex-wrap: nowrap;
        }

        .empty-state {
            padding: 52px 20px;
            text-align: center;
        }

        .empty-state svg {
            width: 48px;
            height: 48px;
            stroke: var(--gray-200);
            fill: none;
            stroke-width: 1.5;
            stroke-linecap: round;
            stroke-linejoin: round;
            margin-bottom: 14px;
        }

        .empty-state p {
            font-size: 15px;
            font-weight: 500;
            color: var(--gray-400);
            margin-bottom: 4px;
        }

        .empty-state small {
            font-size: 13px;
            color: var(--gray-400);
        }

        /* ── PAGINATION ── */
        .pagination-wrap {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 16px;
            flex-wrap: wrap;
            gap: 12px;
        }

        .pagination-info {
            font-size: 13px;
            color: var(--gray-400);
        }

        .pagination-info strong {
            color: var(--gray-900);
            font-weight: 600;
        }

        .pagination-nav {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* tombol halaman dasar */
        .pg-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 36px;
            height: 36px;
            padding: 0 8px;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            font-weight: 500;
            border-radius: var(--radius-sm);
            border: 1.5px solid var(--gray-200);
            background: var(--white);
            color: var(--gray-600);
            text-decoration: none;
            cursor: pointer;
            transition: background .15s, border-color .15s, color .15s;
            user-select: none;
        }

        .pg-btn svg {
            width: 14px;
            height: 14px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .pg-btn:hover {
            background: var(--green-50);
            border-color: var(--green-100);
            color: var(--green-600);
        }

        /* halaman aktif */
        .pg-btn.active {
            background: var(--green-500);
            border-color: var(--green-500);
            color: var(--white);
            font-weight: 600;
            cursor: default;
        }

        .pg-btn.active:hover {
            background: var(--green-500);
            border-color: var(--green-500);
            color: var(--white);
        }

        /* disabled (prev di halaman 1 / next di halaman terakhir) */
        .pg-btn.disabled {
            color: var(--gray-200);
            border-color: var(--gray-200);
            cursor: default;
            pointer-events: none;
        }

        /* separator "..." */
        .pg-dots {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 36px;
            height: 36px;
            font-size: 13px;
            color: var(--gray-400);
            user-select: none;
        }

        /* ── MODAL ── */
        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(28, 25, 23, .5);
            z-index: 999;
            align-items: center;
            justify-content: center;
            padding: 16px;
        }

        .modal-box {
            background: var(--white);
            border: 1.5px solid var(--gray-200);
            border-radius: 16px;
            padding: 28px 28px 24px;
            width: 100%;
            max-width: 400px;
            box-shadow: var(--shadow-md);
            animation: mdlIn .18s ease;
        }

        .modal-header {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            margin-bottom: 18px;
        }

        .modal-icon {
            width: 42px;
            height: 42px;
            background: var(--red-100);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .modal-icon svg {
            width: 20px;
            height: 20px;
            stroke: var(--red-600);
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .modal-title {
            font-family: 'Fraunces', serif;
            font-size: 17px;
            font-weight: 600;
            color: var(--gray-900);
            margin: 0 0 6px;
        }

        .modal-body {
            font-size: 14px;
            color: var(--gray-600);
            line-height: 1.6;
            margin: 0;
        }

        .modal-divider {
            border: none;
            border-top: 1px solid var(--gray-200);
            margin: 18px 0;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn-modal-cancel {
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            font-weight: 500;
            padding: 9px 20px;
            background: transparent;
            color: var(--gray-600);
            border: 1.5px solid var(--gray-200);
            border-radius: var(--radius-sm);
            cursor: pointer;
            transition: background .15s;
        }

        .btn-modal-cancel:hover {
            background: var(--gray-100);
        }

        .btn-modal-confirm {
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            font-weight: 500;
            padding: 9px 20px;
            background: var(--red-100);
            color: var(--red-700);
            border: 1.5px solid #fca5a5;
            border-radius: var(--radius-sm);
            cursor: pointer;
            transition: background .15s, border-color .15s;
        }

        .btn-modal-confirm:hover {
            background: #fecaca;
            border-color: #f87171;
        }

        @keyframes mdlIn {
            from {
                opacity: 0;
                transform: scale(.95) translateY(8px);
            }

            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        @media (max-width: 640px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .filter-bar {
                flex-direction: column;
                align-items: stretch;
            }

            .search-wrap {
                max-width: 100%;
            }

            .aksi-group {
                flex-wrap: wrap;
            }

            .pagination-wrap {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>

    {{-- STAT CARDS --}}
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-card-icon" style="background:var(--green-50);">
                <svg style="stroke:var(--green-500);" viewBox="0 0 24 24">
                    <path d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z" />
                    <path d="M16 3H8a2 2 0 00-2 2v2h12V5a2 2 0 00-2-2z" />
                </svg>
            </div>
            <span class="stat-card-label">Total Barang</span>
            <span class="stat-card-value">{{ $totalBarang }}</span>
            <span class="stat-card-sub">Semua data barang</span>
        </div>
        <div class="stat-card">
            <div class="stat-card-icon" style="background:#eff6ff;">
                <svg style="stroke:#3b82f6;" viewBox="0 0 24 24">
                    <path d="M20.59 13.41l-7.17 7.17a2 2 0 01-2.83 0L2 12V2h10l8.59 8.59a2 2 0 010 2.82z" />
                    <circle cx="7" cy="7" r="1.5" fill="#3b82f6" stroke="none" />
                </svg>
            </div>
            <span class="stat-card-label">Total Kategori</span>
            <span class="stat-card-value">{{ $totalKategori }}</span>
            <span class="stat-card-sub">Semua kategori barang</span>
        </div>
        <div class="stat-card">
            <div class="stat-card-icon" style="background:var(--amber-50);">
                <svg style="stroke:#f59e0b;" viewBox="0 0 24 24">
                    <path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
                    <line x1="12" y1="9" x2="12" y2="13" />
                    <line x1="12" y1="17" x2="12.01" y2="17" />
                </svg>
            </div>
            <span class="stat-card-label">Stok Menipis</span>
            <span class="stat-card-value" style="color:var(--amber-600);">{{ $stokMenipis }}</span>
            <span class="stat-card-sub">Stok kurang dari 20</span>
        </div>
        <div class="stat-card">
            <div class="stat-card-icon" style="background:var(--red-100);">
                <svg style="stroke:var(--red-600);" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" />
                    <line x1="4.93" y1="4.93" x2="19.07" y2="19.07" />
                </svg>
            </div>
            <span class="stat-card-label">Stok Habis</span>
            <span class="stat-card-value" style="color:var(--red-600);">{{ $stokHabis }}</span>
            <span class="stat-card-sub">Stok = 0</span>
        </div>
    </div>

    {{-- PAGE HEADER --}}
    <div class="page-header">
        <h1 class="page-header-title">Daftar Barang</h1>
        <a href="{{ route('items.create') }}" class="btn btn-green">
            <svg viewBox="0 0 24 24">
                <line x1="12" y1="5" x2="12" y2="19" />
                <line x1="5" y1="12" x2="19" y2="12" />
            </svg>
            Tambah Barang
        </a>
    </div>

    {{-- FILTER & SEARCH --}}
    <form id="filterForm" action="{{ route('items.index') }}" method="GET" class="filter-bar">
        <div class="search-wrap">
            <svg viewBox="0 0 24 24">
                <circle cx="11" cy="11" r="8" />
                <line x1="21" y1="21" x2="16.65" y2="16.65" />
            </svg>
            <input type="text" id="searchInput" name="search" placeholder="Cari nama barang, SKU, atau kode..."
                value="{{ request('search') }}" autocomplete="off">
        </div>

        <select id="kategoriSelect" name="kategori_id" class="filter-select">
            <option value="">Semua Kategori</option>
            @foreach ($kategori as $k)
                <option value="{{ $k->id }}" {{ request('kategori_id') == $k->id ? 'selected' : '' }}>
                    {{ $k->nama }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="btn"
            style="background:var(--white);color:var(--gray-600);border-color:var(--gray-200);">
            <svg viewBox="0 0 24 24" style="stroke:var(--gray-600);">
                <circle cx="11" cy="11" r="8" />
                <line x1="21" y1="21" x2="16.65" y2="16.65" />
            </svg>
            Cari
        </button>

        @if (request('search') || request('kategori_id'))
            <a href="{{ route('items.index') }}" class="btn"
                style="background:var(--white);color:var(--gray-400);border-color:var(--gray-200);">
                <svg viewBox="0 0 24 24" style="stroke:var(--gray-400);">
                    <line x1="18" y1="6" x2="6" y2="18" />
                    <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
                Reset
            </a>
        @endif
    </form>

    {{-- TABLE --}}
    <div class="table-wrap">
        <table class="data-table">
            <thead>
                <tr>
                    <th style="width:44px;">#</th>
                    <th style="width:72px;">Foto</th>
                    <th>Nama Barang</th>
                    <th>Kode</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th style="width:180px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                    <tr>
                        <td style="color:var(--gray-400);font-size:13px;">{{ $loop->iteration }}</td>

                        <td>
                            @if ($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" class="item-thumb"
                                    alt="{{ $item->name }}" style="cursor:pointer;"
                                    onclick="previewImage('{{ asset('storage/' . $item->foto) }}', '{{ addslashes($item->name) }}')">
                            @else
                                <div class="item-thumb-placeholder">
                                    <svg viewBox="0 0 24 24">
                                        <rect x="3" y="3" width="18" height="18" rx="2" />
                                        <circle cx="8.5" cy="8.5" r="1.5" />
                                        <polyline points="21 15 16 10 5 21" />
                                    </svg>
                                </div>
                            @endif
                        </td>

                        <td>
                            <div class="item-name">{{ $item->name }}</div>
                        </td>

                        <td>
                            @if ($item->kode_item)
                                <span class="kode-badge">{{ $item->kode_item }}</span>
                            @else
                                <span style="font-size:12px;color:var(--gray-400);">—</span>
                            @endif
                        </td>

                        <td>
                            <span class="badge" style="background:var(--green-50);color:var(--green-600);">
                                {{ $item->kategori->nama ?? '-' }}
                            </span>
                        </td>

                        <td>
                            @if ($item->stok == 0)
                                <span class="badge badge-danger">Habis</span>
                            @elseif ($item->stok < 20)
                                <span class="badge badge-warn">{{ $item->stok }} — Menipis</span>
                            @else
                                <span class="badge badge-ok">{{ $item->stok }}</span>
                            @endif
                        </td>

                        <td style="font-weight:500;">
                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                        </td>

                        <td>
                            <div class="aksi-group">
                                <a href="{{ route('items.show', $item->id) }}" class="btn btn-blue">
                                    <svg viewBox="0 0 24 24">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                        <circle cx="12" cy="12" r="3" />
                                    </svg>
                                    Detail
                                </a>
                                <a href="{{ route('items.edit', $item->id) }}" class="btn btn-amber">
                                    <svg viewBox="0 0 24 24">
                                        <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7" />
                                        <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                                    </svg>
                                    Edit
                                </a>
                                <button type="button" class="btn btn-red"
                                    onclick="bukaMdlHapus('{{ route('items.destroy', $item->id) }}', '{{ addslashes($item->name) }}')">
                                    <svg viewBox="0 0 24 24">
                                        <polyline points="3 6 5 6 21 6" />
                                        <path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6" />
                                        <path d="M10 11v6" />
                                        <path d="M14 11v6" />
                                        <path d="M9 6V4a1 1 0 011-1h4a1 1 0 011 1v2" />
                                    </svg>
                                    Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">
                            <div class="empty-state">
                                <svg viewBox="0 0 24 24">
                                    <circle cx="11" cy="11" r="8" />
                                    <line x1="21" y1="21" x2="16.65" y2="16.65" />
                                </svg>
                                <p>Barang tidak ditemukan</p>
                                <small>Coba ubah kata kunci atau filter kategori</small>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- ══════════════════════════════════════
         CUSTOM PAGINATION
    ══════════════════════════════════════ --}}
    @if ($items instanceof \Illuminate\Pagination\LengthAwarePaginator && $items->hasPages())
        @php
            $currentPage = $items->currentPage();
            $lastPage = $items->lastPage();
            $prevUrl = $items->previousPageUrl();
            $nextUrl = $items->nextPageUrl();
            $firstItem = $items->firstItem();
            $lastItem = $items->lastItem();
            $total = $items->total();

            // Query string (search, kategori_id, dll) untuk setiap link
            $qs = $items->getOptions()['pageName'] ?? 'page';

            // Fungsi bantu: buat URL halaman tertentu
            $pageUrl = fn(int $p) => $items->url($p);

            // Rentang halaman yang ditampilkan: aktif ± 2, selalu tampilkan 1 & lastPage
            $window = 2;
            $pages = collect();
            for ($i = 1; $i <= $lastPage; $i++) {
                if ($i === 1 || $i === $lastPage || ($i >= $currentPage - $window && $i <= $currentPage + $window)) {
                    $pages->push($i);
                }
            }
            // Sisipkan "..." di celah
            $pagesWithDots = [];
            $prev = null;
            foreach ($pages as $p) {
                if ($prev !== null && $p - $prev > 1) {
                    $pagesWithDots[] = '...';
                }
                $pagesWithDots[] = $p;
                $prev = $p;
            }
        @endphp

        <div class="pagination-wrap">

            {{-- Info teks --}}
            <p class="pagination-info">
                Menampilkan <strong>{{ $firstItem }}</strong>–<strong>{{ $lastItem }}</strong>
                dari <strong>{{ $total }}</strong> data
            </p>

            {{-- Tombol navigasi --}}
            <nav class="pagination-nav" aria-label="Navigasi halaman">

                {{-- Tombol First --}}
                @if ($currentPage <= 1)
                    <span class="pg-btn disabled" title="Halaman pertama">
                        <svg viewBox="0 0 24 24">
                            <polyline points="11 17 6 12 11 7" />
                            <polyline points="18 17 13 12 18 7" />
                        </svg>
                    </span>
                @else
                    <a href="{{ $pageUrl(1) }}" class="pg-btn" title="Halaman pertama">
                        <svg viewBox="0 0 24 24">
                            <polyline points="11 17 6 12 11 7" />
                            <polyline points="18 17 13 12 18 7" />
                        </svg>
                    </a>
                @endif

                {{-- Tombol Prev --}}
                @if ($currentPage <= 1)
                    <span class="pg-btn disabled" title="Sebelumnya">
                        <svg viewBox="0 0 24 24">
                            <polyline points="15 18 9 12 15 6" />
                        </svg>
                    </span>
                @else
                    <a href="{{ $prevUrl }}" class="pg-btn" title="Sebelumnya">
                        <svg viewBox="0 0 24 24">
                            <polyline points="15 18 9 12 15 6" />
                        </svg>
                    </a>
                @endif

                {{-- Nomor halaman --}}
                @foreach ($pagesWithDots as $p)
                    @if ($p === '...')
                        <span class="pg-dots">···</span>
                    @elseif ($p === $currentPage)
                        <span class="pg-btn active" aria-current="page">{{ $p }}</span>
                    @else
                        <a href="{{ $pageUrl($p) }}" class="pg-btn">{{ $p }}</a>
                    @endif
                @endforeach

                {{-- Tombol Next --}}
                @if ($currentPage >= $lastPage)
                    <span class="pg-btn disabled" title="Berikutnya">
                        <svg viewBox="0 0 24 24">
                            <polyline points="9 18 15 12 9 6" />
                        </svg>
                    </span>
                @else
                    <a href="{{ $nextUrl }}" class="pg-btn" title="Berikutnya">
                        <svg viewBox="0 0 24 24">
                            <polyline points="9 18 15 12 9 6" />
                        </svg>
                    </a>
                @endif

                {{-- Tombol Last --}}
                @if ($currentPage >= $lastPage)
                    <span class="pg-btn disabled" title="Halaman terakhir">
                        <svg viewBox="0 0 24 24">
                            <polyline points="13 17 18 12 13 7" />
                            <polyline points="6 17 11 12 6 7" />
                        </svg>
                    </span>
                @else
                    <a href="{{ $pageUrl($lastPage) }}" class="pg-btn" title="Halaman terakhir">
                        <svg viewBox="0 0 24 24">
                            <polyline points="13 17 18 12 13 7" />
                            <polyline points="6 17 11 12 6 7" />
                        </svg>
                    </a>
                @endif

            </nav>
        </div>
    @endif

    {{-- MODAL HAPUS --}}
    <div id="mdlHapus" class="modal-overlay">
        <div class="modal-box">
            <div class="modal-header">
                <div class="modal-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
                        <line x1="12" y1="9" x2="12" y2="13" />
                        <line x1="12" y1="17" x2="12.01" y2="17" />
                    </svg>
                </div>
                <div>
                    <p class="modal-title">Hapus barang?</p>
                    <p class="modal-body">
                        Data <strong id="mdlNamaBarang" style="color:var(--gray-900);"></strong>
                        akan dihapus secara permanen dari sistem. Tindakan ini tidak dapat dibatalkan.
                    </p>
                </div>
            </div>
            <hr class="modal-divider">
            <div class="modal-footer">
                <button type="button" class="btn-modal-cancel" onclick="tutupMdlHapus()">Batal</button>
                <form id="formHapus" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-modal-confirm">Ya, Hapus</button>
                </form>
            </div>
        </div>
    </div>

    {{-- MODAL PREVIEW GAMBAR --}}
    <div id="imagePreviewModal"
        style="display:none;position:fixed;z-index:9999;inset:0;background:rgba(0,0,0,0.7);justify-content:center;align-items:center;padding:20px;">
        <div
            style="position:relative;background:white;padding:15px;border-radius:16px;max-width:700px;width:100%;animation:mdlIn .2s ease;">
            <button onclick="closeImagePreview()"
                style="position:absolute;top:10px;right:10px;border:none;background:#ef4444;color:white;width:35px;height:35px;border-radius:50%;cursor:pointer;font-size:18px;font-weight:bold;">×</button>
            <h3 id="previewTitle" style="margin-bottom:15px;color:#111827;"></h3>
            <div style="display:flex;justify-content:center;">
                <img id="previewImage" src=""
                    style="max-width:100%;max-height:70vh;border-radius:12px;object-fit:contain;">
            </div>
        </div>
    </div>

    <script>
        /* ── Fokus search bar setelah reload ── */
        const searchInput = document.getElementById('searchInput');
        if (searchInput.value.length > 0) {
            searchInput.focus();
            const len = searchInput.value.length;
            searchInput.setSelectionRange(len, len);
        }

        /* ── Auto-search debounce 400ms ── */
        let debounceTimer;
        searchInput.addEventListener('input', function() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => document.getElementById('filterForm').submit(), 400);
        });

        document.getElementById('kategoriSelect').addEventListener('change', function() {
            clearTimeout(debounceTimer);
            document.getElementById('filterForm').submit();
        });

        /* ── Modal hapus ── */
        function bukaMdlHapus(url, nama) {
            document.getElementById('formHapus').action = url;
            document.getElementById('mdlNamaBarang').textContent = nama;
            document.getElementById('mdlHapus').style.display = 'flex';
        }

        function tutupMdlHapus() {
            document.getElementById('mdlHapus').style.display = 'none';
        }
        document.getElementById('mdlHapus').addEventListener('click', function(e) {
            if (e.target === this) tutupMdlHapus();
        });

        /* ── Preview gambar ── */
        function previewImage(src, title) {
            document.getElementById('previewImage').src = src;
            document.getElementById('previewTitle').innerText = title;
            document.getElementById('imagePreviewModal').style.display = 'flex';
        }

        function closeImagePreview() {
            document.getElementById('imagePreviewModal').style.display = 'none';
        }
        document.getElementById('imagePreviewModal').addEventListener('click', function(e) {
            if (e.target === this) closeImagePreview();
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                tutupMdlHapus();
                closeImagePreview();
            }
        });
    </script>
@endsection
