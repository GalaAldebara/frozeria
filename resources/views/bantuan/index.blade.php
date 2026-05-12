{{-- resources/views/bantuan/index.blade.php --}}

@extends('layouts.app')

@section('content')
    <style>
        body,
        .main-wrapper {
            overflow: hidden !important;
        }

        .main-wrapper {
            padding: 0 !important;
            max-width: 100% !important;
            flex: 1 !important;
            display: flex !important;
            flex-direction: column !important;
            overflow: hidden !important;
            margin: 0 !important;
        }

        .site-footer {
            display: none !important;
        }

        :root {
            --green-50: #edfaf3;
            --green-100: #c6f0d9;
            --green-400: #2eb872;
            --green-500: #1d9e5e;
            --green-600: #147a47;
            --blue-50: #eff6ff;
            --blue-100: #dbeafe;
            --blue-500: #3b82f6;
            --blue-700: #1d4ed8;
            --gray-50: #fafaf9;
            --gray-100: #f4f3f0;
            --gray-200: #e8e6e0;
            --gray-400: #a8a39a;
            --gray-600: #6b6560;
            --gray-700: #44403c;
            --gray-900: #1c1917;
            --white: #ffffff;
            --radius: 12px;
            --radius-sm: 8px;
            --navbar-h: 64px;
        }

        /* ════════════════════════════
               PAGE SHELL
            ════════════════════════════ */
        .page-shell {
            display: flex;
            flex-direction: column;
            flex: 1;
            height: calc(100vh - var(--navbar-h));
            overflow: hidden;
        }

        /* ── TOP BAR ── */
        .page-top {
            flex-shrink: 0;
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 28px;
            background: var(--white);
            border-bottom: 1.5px solid var(--gray-200);
        }

        .page-title {
            font-family: 'Fraunces', serif;
            font-size: 20px;
            font-weight: 600;
            color: var(--gray-900);
            letter-spacing: -0.3px;
            margin: 0;
        }

        /* ── BODY ── */
        .page-body {
            flex: 1;
            overflow-y: auto;
            padding: 32px 28px;
            background: var(--gray-50);
        }

        .page-body::-webkit-scrollbar {
            width: 5px;
        }

        .page-body::-webkit-scrollbar-track {
            background: transparent;
        }

        .page-body::-webkit-scrollbar-thumb {
            background: var(--gray-200);
            border-radius: 99px;
        }

        /* ── Layout dua kolom ── */
        .content-grid {
            display: grid;
            grid-template-columns: 1fr 340px;
            gap: 24px;
            max-width: 1100px;
            margin: 0 auto;
        }

        /* ════════════════════════════
               PANDUAN CARDS
            ════════════════════════════ */
        .section-label {
            font-size: 11px;
            font-weight: 600;
            color: var(--gray-400);
            text-transform: uppercase;
            letter-spacing: .07em;
            margin-bottom: 14px;
        }

        .guide-stack {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .guide-card {
            background: var(--white);
            border: 1.5px solid var(--gray-200);
            border-radius: var(--radius);
            padding: 20px 22px;
        }

        .guide-card-title {
            font-family: 'Fraunces', serif;
            font-size: 15px;
            font-weight: 600;
            color: var(--gray-900);
            margin: 0 0 16px 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .guide-card-title svg {
            width: 16px;
            height: 16px;
            stroke: var(--green-500);
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            flex-shrink: 0;
        }

        /* Steps */
        .steps {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .step {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .step-num {
            flex-shrink: 0;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: var(--green-50);
            border: 1.5px solid var(--green-100);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 700;
            color: var(--green-600);
            margin-top: 1px;
        }

        .step-text {
            font-size: 13px;
            color: var(--gray-700);
            line-height: 1.6;
        }

        .step-text b {
            color: var(--gray-900);
            font-weight: 600;
        }

        /* Info banner */
        .info-banner {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            background: var(--blue-50);
            border: 1.5px solid var(--blue-100);
            border-radius: var(--radius-sm);
            padding: 12px 14px;
            font-size: 13px;
            color: var(--blue-700);
            line-height: 1.6;
        }

        .info-banner svg {
            width: 15px;
            height: 15px;
            stroke: var(--blue-500);
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            flex-shrink: 0;
            margin-top: 1px;
        }

        .info-banner b {
            font-weight: 600;
        }

        /* ════════════════════════════
               KOLOM KANAN
            ════════════════════════════ */
        .right-col {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        /* Profil card */
        .profile-card {
            background: var(--white);
            border: 1.5px solid var(--gray-200);
            border-radius: var(--radius);
            padding: 20px 22px;
        }

        .profile-card-title {
            font-family: 'Fraunces', serif;
            font-size: 15px;
            font-weight: 600;
            color: var(--gray-900);
            margin: 0 0 16px 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .profile-card-title svg {
            width: 16px;
            height: 16px;
            stroke: var(--green-500);
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        /* Avatar */
        .profile-avatar {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: var(--green-50);
            border: 2px solid var(--green-100);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Fraunces', serif;
            font-size: 22px;
            font-weight: 600;
            color: var(--green-600);
            margin: 0 auto 16px;
        }

        .profile-rows {
            display: flex;
            flex-direction: column;
            gap: 0;
        }

        .profile-row {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            gap: 12px;
            padding: 9px 0;
            border-bottom: 1px solid var(--gray-100);
            font-size: 13px;
        }

        .profile-row:last-child {
            border-bottom: none;
        }

        .profile-row-key {
            color: var(--gray-400);
            font-size: 12px;
            font-weight: 500;
            white-space: nowrap;
        }

        .profile-row-val {
            color: var(--gray-900);
            font-weight: 500;
            text-align: right;
            word-break: break-all;
        }

        /* Version badge */
        .version-card {
            background: var(--green-50);
            border: 1.5px solid var(--green-100);
            border-radius: var(--radius);
            padding: 14px 18px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .version-card svg {
            width: 18px;
            height: 18px;
            stroke: var(--green-500);
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            flex-shrink: 0;
        }

        .version-text {
            font-size: 12px;
            color: var(--green-600);
            line-height: 1.5;
        }

        .version-text strong {
            font-weight: 600;
            font-size: 13px;
        }

        /* ── Responsive ── */
        @media (max-width: 768px) {
            .content-grid {
                grid-template-columns: 1fr;
            }

            .right-col {
                order: -1;
            }

            .page-body {
                padding: 16px;
            }
        }
    </style>

    <div class="page-shell">

        {{-- TOP BAR --}}
        <div class="page-top">
            <h1 class="page-title">Panduan Penggunaan</h1>
        </div>

        {{-- BODY --}}
        <div class="page-body">
            <div class="content-grid">

                {{-- ════ KOLOM KIRI: PANDUAN ════ --}}
                <div>
                    <p class="section-label">Panduan</p>

                    <div class="guide-stack">

                        {{-- Card 1 --}}
                        <div class="guide-card">
                            <h3 class="guide-card-title">
                                <svg viewBox="0 0 24 24">
                                    <line x1="12" y1="5" x2="12" y2="19" />
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>
                                Menambah Barang Baru
                            </h3>
                            <div class="steps">
                                <div class="step">
                                    <div class="step-num">1</div>
                                    <p class="step-text">
                                        Buka halaman <b>Dashboard</b>, klik tombol
                                        <b>+ Tambah Barang</b> di kanan atas.
                                    </p>
                                </div>
                                <div class="step">
                                    <div class="step-num">2</div>
                                    <p class="step-text">
                                        Unggah foto barang (opsional), lalu isi formulir:
                                        nama, kategori, satuan, jumlah stok, harga, dan lainnya.
                                    </p>
                                </div>
                                <div class="step">
                                    <div class="step-num">3</div>
                                    <p class="step-text">
                                        Klik <b>Simpan Barang</b>.
                                        Barang akan muncul di daftar dashboard.
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Card 2 --}}
                        <div class="guide-card">
                            <h3 class="guide-card-title">
                                <svg viewBox="0 0 24 24">
                                    <polyline points="1 4 1 10 7 10" />
                                    <path d="M3.51 15a9 9 0 1 0 .49-4.55" />
                                </svg>
                                Update Stok Barang Masuk
                            </h3>
                            <div class="steps">
                                <div class="step">
                                    <div class="step-num">1</div>
                                    <p class="step-text">
                                        Temukan barang di dashboard menggunakan
                                        pencarian atau filter kategori.
                                    </p>
                                </div>
                                <div class="step">
                                    <div class="step-num">2</div>
                                    <p class="step-text">
                                        Klik tombol <b>Edit</b> pada barang tersebut.
                                    </p>
                                </div>
                                <div class="step">
                                    <div class="step-num">3</div>
                                    <p class="step-text">
                                        Ubah nilai <b>Jumlah Stok</b> sesuai kondisi
                                        saat ini, lalu klik <b>Update Barang</b>.
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Card 3 --}}
                        <div class="guide-card">
                            <h3 class="guide-card-title">
                                <svg viewBox="0 0 24 24">
                                    <path d="M20.59 13.41l-7.17 7.17a2 2 0 01-2.83 0L2 12V2h10l8.59 8.59a2 2 0 010 2.82z" />
                                    <line x1="7" y1="7" x2="7.01" y2="7" />
                                </svg>
                                Mengelola Kategori
                            </h3>
                            <div class="steps">
                                <div class="step">
                                    <div class="step-num">1</div>
                                    <p class="step-text">
                                        Buka halaman <b>Kategori</b> dari navigasi atas.
                                    </p>
                                </div>
                                <div class="step">
                                    <div class="step-num">2</div>
                                    <p class="step-text">
                                        Tambah, edit, atau hapus kategori
                                        sesuai kebutuhan toko.
                                    </p>
                                </div>
                                <div class="step">
                                    <div class="step-num">3</div>
                                    <p class="step-text">
                                        ⚠️ Menghapus kategori akan menghapus semua
                                        barang yang menggunakan kategori tersebut.
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Info banner satuan --}}
                        <div class="info-banner">
                            <svg viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10" />
                                <line x1="12" y1="8" x2="12" y2="12" />
                                <line x1="12" y1="16" x2="12.01" y2="16" />
                            </svg>
                            <span>
                                Satuan barang dapat disesuaikan sesuai kebutuhan seperti:
                                <b>pcs</b>, <b>pack</b>, <b>box</b>, <b>kg</b>, <b>liter</b>,
                                dan lainnya melalui halaman <b>Satuan</b>.
                            </span>
                        </div>

                    </div>
                </div>

                {{-- ════ KOLOM KANAN ════ --}}
                <div class="right-col">

                    <p class="section-label">Informasi Akun</p>

                    {{-- Profil card — data dari Auth::user() --}}
                    <div class="profile-card">
                        <h3 class="profile-card-title">
                            <svg viewBox="0 0 24 24">
                                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2" />
                                <circle cx="12" cy="7" r="4" />
                            </svg>
                            Pengembang
                        </h3>

                        {{-- Avatar inisial dari nama user --}}
                        <div class="profile-avatar">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>

                        <div class="profile-rows">
                            <div class="profile-row">
                                <span class="profile-row-key">Nama</span>
                                <span class="profile-row-val">{{ Auth::user()->name }}</span>
                            </div>
                            <div class="profile-row">
                                <span class="profile-row-key">Email</span>
                                <span class="profile-row-val">{{ Auth::user()->email }}</span>
                            </div>
                            <div class="profile-row">
                                <span class="profile-row-key">Bergabung</span>
                                <span class="profile-row-val">
                                    {{ Auth::user()->created_at->translatedFormat('d F Y') }}
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Version / app info --}}
                    <div class="version-card">
                        <svg viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" />
                            <polyline points="12 6 12 12 16 14" />
                        </svg>
                        <div class="version-text">
                            <strong>Sistem Manajemen Stok</strong><br>
                            Terakhir login: {{ Auth::user()->updated_at->diffForHumans() }}
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
