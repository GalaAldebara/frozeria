@extends('layouts.app')

@section('content')
    <style>
        body,
        .main-wrapper {
            overflow: hidden !important;
        }

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
            --navbar-h: 64px;
        }

        /* ── SHELL ── */
        .page-shell {
            display: flex;
            flex-direction: column;
            height: calc(100vh - var(--navbar-h));
            margin: -28px -32px;
        }

        /* ── TOP BAR ── */
        .page-top {
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 28px;
            background: var(--white);
            border-bottom: 1.5px solid var(--gray-200);
        }

        .page-top-left {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .page-title {
            font-family: 'Fraunces', serif;
            font-size: 20px;
            font-weight: 600;
            color: var(--gray-900);
            letter-spacing: -0.3px;
            margin: 0;
        }

        .page-top-right {
            display: flex;
            align-items: center;
            gap: 8px;
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

        .btn-ghost {
            background: var(--white);
            color: var(--gray-600);
            border-color: var(--gray-200);
        }

        .btn-ghost:hover {
            background: var(--gray-100);
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

        /* ── BODY ── */
        .page-body {
            flex: 1;
            display: grid;
            grid-template-columns: 300px 1fr;
            min-height: 0;
            overflow: hidden;
        }

        /* ── KOLOM KIRI ── */
        .col-left {
            display: flex;
            flex-direction: column;
            border-right: 1.5px solid var(--gray-200);
            background: var(--white);
            padding: 24px 20px;
            gap: 20px;
            overflow-y: auto;
        }

        .col-left::-webkit-scrollbar {
            width: 4px;
        }

        .col-left::-webkit-scrollbar-thumb {
            background: var(--gray-200);
            border-radius: 99px;
        }

        /* foto */
        .foto-box {
            width: 100%;
            aspect-ratio: 1;
            border-radius: 12px;
            overflow: hidden;
            background: var(--gray-100);
            border: 1.5px solid var(--gray-200);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .foto-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .foto-placeholder {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
        }

        .foto-placeholder svg {
            width: 44px;
            height: 44px;
            stroke: var(--gray-200);
            fill: none;
            stroke-width: 1.5;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .foto-placeholder span {
            font-size: 13px;
            color: var(--gray-400);
        }

        /* nama + badge */
        .item-name {
            font-family: 'Fraunces', serif;
            font-size: 22px;
            font-weight: 600;
            color: var(--gray-900);
            letter-spacing: -0.3px;
            line-height: 1.2;
        }

        .item-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-top: 8px;
        }

        .badge {
            display: inline-block;
            font-size: 12px;
            font-weight: 500;
            padding: 4px 10px;
            border-radius: 20px;
        }

        .badge-green {
            background: var(--green-50);
            color: var(--green-600);
        }

        .badge-amber {
            background: var(--amber-50);
            color: var(--amber-600);
        }

        .badge-red {
            background: var(--red-50);
            color: var(--red-700);
        }

        .badge-gray {
            background: var(--gray-100);
            color: var(--gray-600);
        }

        /* info rows kiri */
        .info-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            font-size: 13px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--gray-100);
        }

        .info-row:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .info-row-label {
            color: var(--gray-400);
        }

        .info-row-value {
            font-weight: 500;
            color: var(--gray-900);
            text-align: right;
        }

        /* ── KOLOM KANAN ── */
        .col-right {
            overflow-y: auto;
            padding: 24px 28px;
            background: var(--gray-50);
        }

        .col-right::-webkit-scrollbar {
            width: 5px;
        }

        .col-right::-webkit-scrollbar-thumb {
            background: var(--gray-200);
            border-radius: 99px;
        }

        /* section label */
        .section-label {
            font-size: 11px;
            font-weight: 600;
            color: var(--gray-400);
            text-transform: uppercase;
            letter-spacing: 0.07em;
            margin-bottom: 12px;
        }

        /* stat cards */
        .stat-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin-bottom: 20px;
        }

        .stat-card {
            background: var(--white);
            border: 1.5px solid var(--gray-200);
            border-radius: var(--radius);
            padding: 16px 18px;
            box-shadow: var(--shadow-sm);
        }

        .stat-card-label {
            font-size: 12px;
            color: var(--gray-400);
            margin-bottom: 6px;
        }

        .stat-card-value {
            font-family: 'Fraunces', serif;
            font-size: 26px;
            font-weight: 600;
            color: var(--gray-900);
            line-height: 1;
        }

        .stat-card-unit {
            font-size: 13px;
            font-weight: 400;
            color: var(--gray-400);
            margin-left: 4px;
        }

        /* deskripsi */
        .desc-card {
            background: var(--white);
            border: 1.5px solid var(--gray-200);
            border-radius: var(--radius);
            padding: 18px 20px;
            box-shadow: var(--shadow-sm);
            margin-bottom: 20px;
        }

        .desc-card-label {
            font-size: 12px;
            font-weight: 600;
            color: var(--gray-400);
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin-bottom: 10px;
        }

        .desc-card-text {
            font-size: 14px;
            color: var(--gray-600);
            line-height: 1.75;
        }

        /* harga */
        .harga-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin-bottom: 20px;
        }

        .harga-card {
            background: var(--white);
            border: 1.5px solid var(--gray-200);
            border-radius: var(--radius);
            padding: 16px 18px;
            box-shadow: var(--shadow-sm);
        }

        .harga-card-label {
            font-size: 12px;
            color: var(--gray-400);
            margin-bottom: 6px;
        }

        .harga-card-value {
            font-family: 'Fraunces', serif;
            font-size: 22px;
            font-weight: 600;
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

        @media (max-width: 860px) {
            .page-body {
                grid-template-columns: 1fr;
            }

            .col-left {
                border-right: none;
                border-bottom: 1.5px solid var(--gray-200);
            }

            .foto-box {
                aspect-ratio: 16/7;
            }
        }
    </style>

    <div class="page-shell">

        {{-- ── TOP BAR ── --}}
        <div class="page-top">
            <div class="page-top-left">
                <a href="{{ route('items.index') }}" class="btn btn-ghost">
                    <svg viewBox="0 0 24 24">
                        <polyline points="15 18 9 12 15 6" />
                    </svg>
                    Kembali
                </a>
                <h1 class="page-title">Detail Barang</h1>
            </div>
            <div class="page-top-right">
                <a href="{{ route('items.edit', $item->id) }}" class="btn btn-blue">
                    <svg viewBox="0 0 24 24">
                        <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7" />
                        <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                    </svg>
                    Edit Barang
                </a>
                <button type="button" class="btn btn-red" onclick="bukaMdlHapus()">
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
        </div>

        {{-- ── BODY ── --}}
        <div class="page-body">

            {{-- KIRI: identitas item --}}
            <div class="col-left">

                <div class="foto-box">
                    @if ($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->name }}">
                    @else
                        <div class="foto-placeholder">
                            <svg viewBox="0 0 24 24">
                                <rect x="3" y="3" width="18" height="18" rx="2" />
                                <circle cx="8.5" cy="8.5" r="1.5" />
                                <polyline points="21 15 16 10 5 21" />
                            </svg>
                            <span>Tidak ada foto</span>
                        </div>
                    @endif
                </div>

                <div>
                    <div class="item-name">{{ $item->name }}</div>
                    <div class="item-meta">
                        <span class="badge badge-green">{{ $item->kategori->nama ?? '-' }}</span>
                        @if ($item->stok == 0)
                            <span class="badge badge-red">Stok Habis</span>
                        @elseif ($item->stok < ($item->stok_minimum ?? 20))
                            <span class="badge badge-amber">Stok Menipis</span>
                        @else
                            <span class="badge badge-green">Stok Aman</span>
                        @endif
                    </div>
                </div>

                <div class="info-list">

                    <div class="info-row">
                        <span class="info-row-label">Kode Item</span>
                        <span class="info-row-value">
                            {{ $item->kode_item ?? '-' }}
                        </span>
                    </div>

                    <div class="info-row">
                        <span class="info-row-label">Berat</span>
                        <span class="info-row-value">
                            {{ $item->weight ?? '-' }}
                        </span>
                    </div>

                    <div class="info-row">
                        <span class="info-row-label">Satuan</span>
                        <span class="info-row-value">
                            {{ $item->satuan->kode ?? '-' }}
                        </span>
                    </div>

                    <div class="info-row">
                        <span class="info-row-label">Lokasi Simpan</span>
                        <span class="info-row-value">
                            {{ $item->lokasi ?? '-' }}
                        </span>
                    </div>

                </div>

            </div>

            {{-- KANAN: statistik & detail --}}
            <div class="col-right">

                {{-- Stok --}}
                <p class="section-label">Stok</p>
                <div class="stat-grid">
                    <div class="stat-card">
                        <div class="stat-card-label">Jumlah Stok</div>
                        <div class="stat-card-value">
                            {{ $item->stok }}
                            <span class="stat-card-unit">{{ $item->satuan->kode ?? '' }}</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-card-label">Stok Minimum</div>
                        <div class="stat-card-value">
                            {{ $item->stok_minimum ?? 20 }}
                            <span class="stat-card-unit">{{ $item->satuan->kode ?? '' }}</span>
                        </div>
                    </div>
                </div>

                {{-- Harga --}}
                <p class="section-label">Harga</p>
                <div class="harga-grid">
                    <div class="harga-card">
                        <div class="harga-card-label">Harga Beli</div>
                        <div class="harga-card-value" style="color: var(--gray-900);">
                            Rp {{ number_format($item->harga_beli, 0, ',', '.') }}
                        </div>
                    </div>
                    <div class="harga-card">
                        <div class="harga-card-label">Harga Jual</div>
                        <div class="harga-card-value" style="color: var(--green-600);">
                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                        </div>
                    </div>
                </div>

                {{-- Deskripsi --}}
                <p class="section-label">Deskripsi</p>
                <div class="desc-card">
                    <div class="desc-card-text">
                        {{ $item->deskripsi ?? 'Tidak ada deskripsi untuk barang ini.' }}
                    </div>
                </div>

            </div>
        </div>
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
                    <p class="modal-title">Hapus barang?</p>
                    <p class="modal-body">
                        Data <strong style="color: var(--gray-900);">{{ $item->name }}</strong>
                        akan dihapus secara permanen dari sistem. Tindakan ini tidak dapat dibatalkan.
                    </p>
                </div>
            </div>
            <hr class="modal-divider">
            <div class="modal-footer">
                <button type="button" class="btn-modal-cancel" onclick="tutupMdlHapus()">Batal</button>
                <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-modal-confirm">Ya, Hapus</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function bukaMdlHapus() {
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
