{{-- resources/views/kategori/edit.blade.php --}}

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
            --red-50: #fff5f5;
            --red-100: #fee2e2;
            --red-700: #b91c1c;
            --gray-50: #fafaf9;
            --gray-100: #f4f3f0;
            --gray-200: #e8e6e0;
            --gray-400: #a8a39a;
            --gray-600: #6b6560;
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

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            font-weight: 500;
            color: var(--gray-600);
            background: var(--white);
            border: 1.5px solid var(--gray-200);
            padding: 7px 13px;
            border-radius: var(--radius-sm);
            text-decoration: none;
            transition: background .15s, border-color .15s;
        }

        .btn-back:hover {
            background: var(--gray-100);
            border-color: var(--gray-400);
        }

        .btn-back svg {
            width: 15px;
            height: 15px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .page-title {
            font-family: 'Fraunces', serif;
            font-size: 20px;
            font-weight: 600;
            color: var(--gray-900);
            letter-spacing: -0.3px;
            margin: 0;
        }

        /* ════════════════════════════
               BODY — scrollable area
            ════════════════════════════ */
        .page-body {
            flex: 1;
            overflow-y: auto;
            padding: 32px 28px;
            background: var(--gray-50);
            display: flex;
            flex-direction: column;
            align-items: center;
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

        /* ── Kartu form ── */
        .form-card {
            width: 100%;
            max-width: 560px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* ── Error ── */
        .alert-error {
            background: var(--red-50);
            border: 1.5px solid #fca5a5;
            border-radius: var(--radius-sm);
            padding: 12px 16px;
        }

        .alert-error-header {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            font-weight: 600;
            color: var(--red-700);
            margin-bottom: 6px;
        }

        .alert-error-header svg {
            width: 15px;
            height: 15px;
            stroke: var(--red-700);
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .alert-error ul {
            margin: 0;
            padding-left: 17px;
            font-size: 13px;
            color: var(--red-700);
            line-height: 1.7;
        }

        /* ── Panel isian ── */
        .fields-panel {
            background: var(--white);
            border: 1.5px solid var(--gray-200);
            border-radius: var(--radius);
            padding: 24px;
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .form-group label {
            font-size: 12px;
            font-weight: 600;
            color: var(--gray-600);
        }

        .form-group label .req {
            color: var(--green-500);
            margin-left: 2px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 9px 12px;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            color: var(--gray-900);
            background: var(--white);
            border: 1.5px solid var(--gray-200);
            border-radius: var(--radius-sm);
            outline: none;
            box-sizing: border-box;
            transition: border-color .15s, box-shadow .15s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: var(--green-400);
            box-shadow: 0 0 0 3px rgba(46, 184, 114, .15);
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: var(--gray-400);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        /* ── Footer tombol ── */
        .form-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn-cancel {
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            font-weight: 500;
            padding: 9px 18px;
            background: var(--white);
            color: var(--gray-600);
            border: 1.5px solid var(--gray-200);
            border-radius: var(--radius-sm);
            text-decoration: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: background .15s;
        }

        .btn-cancel:hover {
            background: var(--gray-100);
        }

        .btn-submit {
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            font-weight: 500;
            padding: 9px 22px;
            background: var(--green-500);
            color: var(--white);
            border: none;
            border-radius: var(--radius-sm);
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            transition: background .15s, transform .1s;
        }

        .btn-submit:hover {
            background: var(--green-600);
        }

        .btn-submit:active {
            transform: scale(.98);
        }

        .btn-submit svg,
        .btn-cancel svg {
            width: 14px;
            height: 14px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        @media (max-width: 640px) {
            .page-body {
                padding: 16px;
            }

            .form-footer {
                flex-direction: column-reverse;
            }

            .btn-cancel,
            .btn-submit {
                justify-content: center;
            }
        }
    </style>

    <div class="page-shell">

        {{-- TOP BAR --}}
        <div class="page-top">
            <a href="{{ route('kategori.index') }}" class="btn-back">
                <svg viewBox="0 0 24 24">
                    <polyline points="15 18 9 12 15 6" />
                </svg>
                Kembali
            </a>
            <h1 class="page-title">Edit Kategori</h1>
        </div>

        {{-- BODY --}}
        <div class="page-body">
            <div class="form-card">

                {{-- Error --}}
                @if ($errors->any())
                    <div class="alert-error">
                        <div class="alert-error-header">
                            <svg viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10" />
                                <line x1="12" y1="8" x2="12" y2="12" />
                                <line x1="12" y1="16" x2="12.01" y2="16" />
                            </svg>
                            Terdapat {{ $errors->count() }} kesalahan, silakan periksa kembali.
                        </div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Form --}}
                <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="fields-panel">

                        <div class="form-group">
                            <label>Nama Kategori <span class="req">*</span></label>
                            <input type="text" name="nama" value="{{ old('nama', $kategori->nama) }}"
                                placeholder="cth. Frozen Food" required>
                        </div>

                        <div class="form-group">
                            <label>Deskripsi <span style="color:var(--gray-400);font-weight:400;">(opsional)</span></label>
                            <textarea name="deskripsi" placeholder="Masukkan deskripsi kategori...">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
                        </div>

                    </div>

                    <div class="form-footer" style="margin-top: 20px;">
                        <a href="{{ route('kategori.index') }}" class="btn-cancel">
                            <svg viewBox="0 0 24 24">
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                            Batal
                        </a>
                        <button type="submit" class="btn-submit">
                            <svg viewBox="0 0 24 24">
                                <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z" />
                                <polyline points="17 21 17 13 7 13 7 21" />
                                <polyline points="7 3 7 8 15 8" />
                            </svg>
                            Update Kategori
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>

@endsection
