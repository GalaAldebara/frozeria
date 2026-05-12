@extends('layouts.app')

@section('content')
    <style>
        :root {
            --green-50: #edfaf3;
            --green-100: #c6f0d9;
            --green-400: #2eb872;
            --green-500: #1d9e5e;
            --green-600: #147a47;
            --amber-50: #fffbeb;
            --amber-100: #fef3c7;
            --amber-600: #92400e;
            --red-50: #fff5f5;
            --red-100: #fee2e2;
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
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.08);
            --radius: 12px;
            --radius-sm: 8px;
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

        .page-title {
            font-family: 'Fraunces', serif;
            font-size: 22px;
            font-weight: 600;
            color: var(--gray-900);
            letter-spacing: -0.3px;
            margin: 0;
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
            border: 1.5px solid transparent;
            cursor: pointer;
            text-decoration: none;
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

        .btn-red {
            background: var(--red-50);
            color: var(--red-700);
            border-color: var(--red-100);
        }

        .btn-red:hover {
            background: var(--red-100);
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
            max-width: 360px;
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
            padding: 13px 16px;
            color: var(--gray-900);
            vertical-align: middle;
        }

        /* kategori icon */
        .kategori-cell {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .kategori-icon {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            background: var(--green-50);
            border: 1.5px solid var(--green-100);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .kategori-icon svg {
            width: 16px;
            height: 16px;
            stroke: var(--green-600);
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .kategori-name {
            font-weight: 600;
            color: var(--gray-900);
        }

        /* badge jumlah barang */
        .badge-count {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 12px;
            font-weight: 500;
            padding: 4px 10px;
            background: var(--gray-100);
            color: var(--gray-600);
            border-radius: 20px;
        }

        .badge-count svg {
            width: 12px;
            height: 12px;
            stroke: var(--gray-400);
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        /* tanggal */
        .date-text {
            font-size: 13px;
            color: var(--gray-400);
        }

        /* aksi */
        .aksi-group {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        /* empty state */
        .empty-state {
            padding: 52px 20px;
            text-align: center;
        }

        .empty-state svg {
            width: 44px;
            height: 44px;
            stroke: var(--gray-200);
            fill: none;
            stroke-width: 1.5;
            stroke-linecap: round;
            stroke-linejoin: round;
            margin-bottom: 12px;
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

        /* total footer */
        .table-footer {
            margin-top: 12px;
            font-size: 13px;
            color: var(--gray-400);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .table-footer svg {
            width: 14px;
            height: 14px;
            stroke: var(--gray-400);
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        /* ── MODAL HAPUS ── */
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
            stroke: var(--red-700);
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
    </style>

    {{-- ── PAGE HEADER ── --}}
    <div class="page-header">
        <h1 class="page-title">Daftar Kategori</h1>
        <a href="{{ route('kategori.create') }}" class="btn btn-green">
            <svg viewBox="0 0 24 24">
                <line x1="12" y1="5" x2="12" y2="19" />
                <line x1="5" y1="12" x2="19" y2="12" />
            </svg>
            Tambah Kategori
        </a>
    </div>

    {{-- ── FILTER BAR ── --}}
    <form id="filterForm" action="{{ route('kategori.index') }}" method="GET" class="filter-bar">
        <div class="search-wrap">
            <svg viewBox="0 0 24 24">
                <circle cx="11" cy="11" r="8" />
                <line x1="21" y1="21" x2="16.65" y2="16.65" />
            </svg>
            <input type="text" id="searchInput" name="search" placeholder="Cari nama kategori..."
                value="{{ request('search') }}" autocomplete="off">
        </div>

        <button type="submit" class="btn"
            style="background: var(--white); color: var(--gray-600); border-color: var(--gray-200);">
            <svg viewBox="0 0 24 24" style="stroke: var(--gray-600);">
                <circle cx="11" cy="11" r="8" />
                <line x1="21" y1="21" x2="16.65" y2="16.65" />
            </svg>
            Cari
        </button>

        @if (request('search'))
            <a href="{{ route('kategori.index') }}" class="btn"
                style="background: var(--white); color: var(--gray-400); border-color: var(--gray-200);">
                <svg viewBox="0 0 24 24" style="stroke: var(--gray-400);">
                    <line x1="18" y1="6" x2="6" y2="18" />
                    <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
                Reset
            </a>
        @endif
    </form>

    {{-- ── TABLE ── --}}
    <div class="table-wrap">
        <table class="data-table">
            <thead>
                <tr>
                    <th style="width: 44px;">#</th>
                    <th>Nama Kategori</th>
                    <th>Jumlah Barang</th>
                    <th>Dibuat</th>
                    <th style="width: 160px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kategori as $k)
                    <tr>
                        <td style="color: var(--gray-400); font-size: 13px;">{{ $loop->iteration }}</td>

                        <td>
                            <div class="kategori-cell">
                                <div class="kategori-icon">
                                    <svg viewBox="0 0 24 24">
                                        <path
                                            d="M20.59 13.41l-7.17 7.17a2 2 0 01-2.83 0L2 12V2h10l8.59 8.59a2 2 0 010 2.82z" />
                                        <circle cx="7" cy="7" r="1.5" fill="var(--green-600)"
                                            stroke="none" />
                                    </svg>
                                </div>
                                <span class="kategori-name">{{ $k->nama }}</span>
                            </div>
                        </td>

                        <td>
                            <span class="badge-count">
                                <svg viewBox="0 0 24 24">
                                    <path d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z" />
                                    <path d="M16 3H8a2 2 0 00-2 2v2h12V5a2 2 0 00-2-2z" />
                                </svg>
                                {{ $k->items_count ?? 0 }} barang
                            </span>
                        </td>

                        <td>
                            <span class="date-text">{{ $k->created_at->format('d M Y') }}</span>
                        </td>

                        <td>
                            <div class="aksi-group">
                                <a href="{{ route('kategori.edit', $k->id) }}" class="btn btn-blue">
                                    <svg viewBox="0 0 24 24">
                                        <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7" />
                                        <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                                    </svg>
                                    Edit
                                </a>
                                <button type="button" class="btn btn-red"
                                    onclick="bukaMdlHapus('{{ route('kategori.destroy', $k->id) }}', '{{ addslashes($k->nama) }}')">
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
                        <td colspan="5">
                            <div class="empty-state">
                                <svg viewBox="0 0 24 24">
                                    <path d="M20.59 13.41l-7.17 7.17a2 2 0 01-2.83 0L2 12V2h10l8.59 8.59a2 2 0 010 2.82z" />
                                    <circle cx="7" cy="7" r="1.5" />
                                </svg>
                                <p>Kategori tidak ditemukan</p>
                                <small>Coba ubah kata kunci pencarian</small>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="table-footer">
        <svg viewBox="0 0 24 24">
            <path d="M20.59 13.41l-7.17 7.17a2 2 0 01-2.83 0L2 12V2h10l8.59 8.59a2 2 0 010 2.82z" />
            <circle cx="7" cy="7" r="1.5" />
        </svg>
        {{ $kategori->count() }} kategori terdaftar
    </div>

    {{-- ── MODAL HAPUS ── --}}
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
                    <p class="modal-title">Hapus kategori?</p>
                    <p class="modal-body">
                        Kategori <strong id="mdlNamaKategori" style="color: var(--gray-900);"></strong>
                        akan dihapus secara permanen. Tindakan ini tidak dapat dibatalkan.
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

    <script>
        /* ── Auto-search debounce ── */
        const searchInput = document.getElementById('searchInput');

        if (searchInput.value.length > 0) {
            searchInput.focus();
            const len = searchInput.value.length;
            searchInput.setSelectionRange(len, len);
        }

        let debounceTimer;
        searchInput.addEventListener('input', function() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(function() {
                document.getElementById('filterForm').submit();
            }, 400);
        });

        /* ── Modal hapus ── */
        function bukaMdlHapus(actionUrl, namaKategori) {
            document.getElementById('formHapus').action = actionUrl;
            document.getElementById('mdlNamaKategori').textContent = namaKategori;
            document.getElementById('mdlHapus').style.display = 'flex';
        }

        function tutupMdlHapus() {
            document.getElementById('mdlHapus').style.display = 'none';
        }

        document.getElementById('mdlHapus').addEventListener('click', function(e) {
            if (e.target === this) tutupMdlHapus();
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') tutupMdlHapus();
        });
    </script>
@endsection
