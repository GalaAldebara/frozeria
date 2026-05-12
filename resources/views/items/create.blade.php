@extends('layouts.app')

@section('content')

    <style>
        /* ── Override layout wrapper ── */
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

        .page-shell {
            display: flex;
            flex-direction: column;
            flex: 1;
            height: calc(100vh - var(--navbar-h));
            overflow: hidden;
        }

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

        .page-body {
            flex: 1;
            display: flex;
            min-height: 0;
            overflow: hidden;
            position: relative;
        }

        /* ── KOLOM FOTO ── */
        .col-foto {
            width: 280px;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            gap: 16px;
            padding: 24px 20px;
            background: var(--white);
            overflow: visible;
            position: relative;
        }

        .col-foto-label {
            font-size: 11px;
            font-weight: 600;
            color: var(--gray-400);
            text-transform: uppercase;
            letter-spacing: .07em;
        }

        .foto-preview-wrap {
            flex: 1;
            min-height: 0;
            border-radius: 10px;
            overflow: hidden;
            background: var(--gray-100);
            border: 1.5px solid var(--gray-200);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .foto-preview-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .col-foto.wide .foto-preview-wrap img {
            object-fit: contain;
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

        .foto-upload-label {
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 10px;
            background: var(--green-50);
            color: var(--green-600);
            border: 1.5px dashed var(--green-100);
            border-radius: var(--radius-sm);
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: background .15s, border-color .15s;
        }

        .foto-upload-label:hover {
            background: var(--green-100);
            border-color: var(--green-400);
        }

        .foto-upload-label svg {
            width: 15px;
            height: 15px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .foto-upload-label input[type="file"] {
            display: none;
        }

        .foto-hint {
            font-size: 11px;
            color: var(--gray-400);
            text-align: center;
            margin: 0;
        }

        /* ── RESIZE HANDLE ── */
        .resize-handle {
            position: absolute;
            top: 0;
            right: -1px;
            width: 1px;
            height: 100%;
            cursor: col-resize;
            z-index: 30;
        }

        .resize-handle::before {
            content: '';
            position: absolute;
            inset: 0;
            width: 1px;
            background: var(--gray-200);
            transition: background .2s;
        }

        .resize-handle::after {
            content: '';
            position: absolute;
            top: 0;
            left: -6px;
            width: 13px;
            height: 100%;
        }

        .resize-grip {
            position: absolute;
            top: 50%;
            right: -10px;
            transform: translateY(-50%);
            width: 20px;
            height: 44px;
            background: var(--white);
            border: 1px solid var(--gray-200);
            border-radius: 99px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 3px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, .06);
            transition: border-color .2s, box-shadow .2s, background .2s, height .2s;
            pointer-events: none;
            z-index: 40;
        }

        .grip-line {
            width: 4px;
            height: 1.5px;
            background: var(--gray-400);
            border-radius: 99px;
            transition: background .2s, width .2s;
        }

        .resize-handle:hover::before {
            background: var(--green-400);
        }

        .resize-handle:hover .resize-grip {
            border-color: var(--green-400);
            background: var(--green-50);
            height: 56px;
            box-shadow: 0 2px 12px rgba(46, 184, 114, .18), 0 0 0 3px rgba(46, 184, 114, .08);
        }

        .resize-handle:hover .grip-line {
            background: var(--green-500);
            width: 5px;
        }

        .resize-handle.dragging::before {
            background: var(--green-400);
        }

        .resize-handle.dragging .resize-grip {
            border-color: var(--green-500);
            background: var(--green-50);
            height: 60px;
            box-shadow: 0 4px 16px rgba(46, 184, 114, .22), 0 0 0 4px rgba(46, 184, 114, .10);
        }

        .resize-handle.dragging .grip-line {
            background: var(--green-500);
        }

        body.is-resizing {
            cursor: col-resize !important;
            user-select: none !important;
        }

        body.is-resizing * {
            pointer-events: none !important;
            cursor: col-resize !important;
        }

        body.is-resizing .resize-handle {
            pointer-events: auto !important;
        }

        /* ── KOLOM FIELDS ── */
        .col-fields {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            background: var(--gray-50);
        }

        .col-fields-scroll {
            flex: 1;
            overflow-y: auto;
            padding: 24px 28px;
        }

        .col-fields-scroll::-webkit-scrollbar {
            width: 5px;
        }

        .col-fields-scroll::-webkit-scrollbar-track {
            background: transparent;
        }

        .col-fields-scroll::-webkit-scrollbar-thumb {
            background: var(--gray-200);
            border-radius: 99px;
        }

        .alert-error {
            background: var(--red-50);
            border: 1.5px solid #fca5a5;
            border-radius: var(--radius-sm);
            padding: 12px 16px;
            margin-bottom: 20px;
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

        .fields-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .field-full {
            grid-column: 1 / -1;
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
        .form-group select,
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
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: var(--green-400);
            box-shadow: 0 0 0 3px rgba(46, 184, 114, .15);
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: var(--gray-400);
        }

        .form-group textarea {
            resize: none;
            height: 72px;
        }

        .input-prefix-wrap {
            position: relative;
        }

        .input-prefix-wrap .prefix {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 12px;
            font-weight: 500;
            color: var(--gray-400);
            pointer-events: none;
        }

        .input-prefix-wrap input {
            padding-left: 34px;
        }

        .section-divider {
            grid-column: 1 / -1;
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 2px 0;
        }

        .section-divider span {
            font-size: 10px;
            font-weight: 600;
            color: var(--gray-400);
            text-transform: uppercase;
            letter-spacing: .07em;
            white-space: nowrap;
        }

        .section-divider hr {
            flex: 1;
            border: none;
            border-top: 1px solid var(--gray-200);
        }

        .col-fields-footer {
            flex-shrink: 0;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 10px;
            padding: 14px 28px;
            background: var(--white);
            border-top: 1.5px solid var(--gray-200);
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
                flex-direction: column;
                overflow-y: auto;
            }

            .col-foto {
                width: 100% !important;
                min-width: unset !important;
                height: 240px;
                flex-shrink: 0;
                flex-direction: row;
                align-items: stretch;
                gap: 14px;
                padding: 14px 16px;
                border-bottom: 1.5px solid var(--gray-200);
                overflow: hidden;
            }

            .foto-preview-wrap {
                width: 150px;
                flex: none;
            }

            .col-foto-bottom {
                flex: 1;
                display: flex;
                flex-direction: column;
                gap: 10px;
                justify-content: flex-end;
            }

            .resize-handle {
                display: none;
            }

            .col-fields {
                flex: 1;
            }

            .col-fields-scroll {
                padding: 16px;
            }

            .fields-grid {
                grid-template-columns: 1fr !important;
            }

            .field-full {
                grid-column: 1;
            }
        }
    </style>

    <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data" style="display:contents;">
        @csrf

        <div class="page-shell">

            {{-- TOP BAR --}}
            <div class="page-top">
                <a href="{{ route('items.index') }}" class="btn-back">
                    <svg viewBox="0 0 24 24">
                        <polyline points="15 18 9 12 15 6" />
                    </svg>
                    Kembali
                </a>
                <h1 class="page-title">Tambah Barang Baru</h1>
            </div>

            {{-- BODY --}}
            <div class="page-body" id="pageBody">

                {{-- KOLOM FOTO --}}
                <div class="col-foto" id="colFoto">

                    <div class="resize-handle" id="resizeHandle">
                        <div class="resize-grip">
                            <span class="grip-line"></span>
                            <span class="grip-line"></span>
                            <span class="grip-line"></span>
                        </div>
                    </div>

                    <span class="col-foto-label">Foto Produk</span>

                    <div class="foto-preview-wrap" id="fotoPreviewWrap">
                        <div class="foto-placeholder" id="fotoPlaceholder">
                            <svg viewBox="0 0 24 24">
                                <rect x="3" y="3" width="18" height="18" rx="2" />
                                <circle cx="8.5" cy="8.5" r="1.5" />
                                <polyline points="21 15 16 10 5 21" />
                            </svg>
                            <span>Belum ada foto</span>
                        </div>
                        <img id="fotoPreview" src="" alt=""
                            style="display:none;width:100%;height:100%;object-fit:cover;">
                    </div>

                    <label class="foto-upload-label">
                        <svg viewBox="0 0 24 24">
                            <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4" />
                            <polyline points="17 8 12 3 7 8" />
                            <line x1="12" y1="3" x2="12" y2="15" />
                        </svg>
                        Pilih Foto
                        <input type="file" name="foto" id="fotoInput" accept="image/*">
                    </label>

                    <p class="foto-hint">JPG, PNG, WEBP — maks. 2 MB</p>

                </div>

                {{-- KOLOM FIELDS --}}
                <div class="col-fields">
                    <div class="col-fields-scroll">

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

                        <div class="fields-grid" id="fieldsGrid">

                            <div class="form-group">
                                <label>Nama Barang <span class="req">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                    placeholder="cth. Sosis Sapi Premium" required>
                            </div>

                            <div class="form-group">
                                <label>Kategori <span class="req">*</span></label>
                                <select name="kategori_id" required>
                                    <option value="">Pilih kategori</option>
                                    @foreach ($kategori as $k)
                                        <option value="{{ $k->id }}"
                                            {{ old('kategori_id') == $k->id ? 'selected' : '' }}>
                                            {{ $k->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Satuan <span class="req">*</span></label>
                                <select name="satuan_id" required>
                                    <option value="">Pilih satuan</option>
                                    @foreach ($satuan as $s)
                                        <option value="{{ $s->id }}"
                                            {{ old('satuan_id') == $s->id ? 'selected' : '' }}>
                                            {{ $s->kode }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- STOK --}}
                            <div class="form-group">
                                <label>Jumlah Stok <span class="req">*</span></label>

                                <input type="number" name="stok" min="0" max="99999" step="1"
                                    value="{{ old('stok', 0) }}" class="clear-on-focus" data-restore="0" required>
                            </div>

                            {{-- STOK MINIMUM --}}
                            <div class="form-group">
                                <label>Stok Minimum</label>

                                <input type="number" name="stok_minimum" min="0" max="99999" step="1"
                                    value="{{ old('stok_minimum', 20) }}" class="clear-on-focus" data-restore="20">
                            </div>

                            <div class="section-divider">
                                <span>Harga</span>
                                <hr>
                            </div>

                            {{-- BERAT --}}
                            <div class="form-group">
                                <label>Berat</label>

                                <input type="text" name="weight" maxlength="20"
                                    value="{{ old('weight', $item->weight ?? '') }}" placeholder="Contoh: 500gr / 1kg">
                            </div>

                            {{-- HARGA JUAL --}}
                            <div class="form-group">
                                <label>Harga Jual <span class="req">*</span></label>

                                <div class="input-prefix-wrap">
                                    <span class="prefix">Rp</span>

                                    <input type="number" name="harga" min="0" max="100000000" step="100"
                                        value="{{ old('harga', 0) }}" class="clear-on-focus" data-restore="0" required>
                                </div>
                            </div>

                            {{-- HARGA BELI --}}
                            <div class="form-group">
                                <label>Harga Beli <span class="req">*</span></label>

                                <div class="input-prefix-wrap">
                                    <span class="prefix">Rp</span>

                                    <input type="number" name="harga_beli" min="0" max="100000000"
                                        step="100" value="{{ old('harga_beli', 0) }}" class="clear-on-focus"
                                        data-restore="0" required>
                                </div>
                            </div>

                            <div class="section-divider"><span>Lainnya</span>
                                <hr>
                            </div>

                            <div class="form-group field-full">
                                <label>Lokasi Simpan</label>
                                <input type="text" name="lokasi" value="{{ old('lokasi') }}"
                                    placeholder="cth. Rak A-3, Freezer 2">
                            </div>

                            <div class="form-group field-full">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" placeholder="Keterangan tambahan tentang barang ini...">{{ old('deskripsi') }}</textarea>
                            </div>

                        </div>
                    </div>

                    <div class="col-fields-footer">
                        <a href="{{ route('items.index') }}" class="btn-cancel">
                            <svg viewBox="0 0 24 24">
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                            Batal
                        </a>
                        <button type="submit" class="btn-submit">
                            <svg viewBox="0 0 24 24">
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Simpan Barang
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </form>

    <script>
        /* ─────────────────────────────────────────
                                                       1. Preview foto
                                                    ───────────────────────────────────────── */
        document.getElementById('fotoInput').addEventListener('change', function() {
            const file = this.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('fotoPreview');
                const placeholder = document.getElementById('fotoPlaceholder');
                preview.src = e.target.result;
                preview.style.display = 'block';
                if (placeholder) placeholder.style.display = 'none';
            };
            reader.readAsDataURL(file);
        });

        /* ─────────────────────────────────────────
           2. Clear-on-focus untuk field angka
              Saat nilai = 0 (atau sama dengan default),
              kosongkan field agar user langsung ketik.
              Saat blur tanpa nilai, restore ke default.
        ───────────────────────────────────────── */
        document.querySelectorAll('input.clear-on-focus').forEach(function(input) {
            input.addEventListener('focus', function() {
                if (this.value === '0' || this.value === this.dataset.restore) {
                    this.value = '';
                }
            });

            input.addEventListener('blur', function() {
                if (this.value === '' || this.value === null) {
                    this.value = this.dataset.restore ?? '0';
                }
            });
        });

        /* ─────────────────────────────────────────
           3. Resize handle
        ───────────────────────────────────────── */
        (function() {
            const handle = document.getElementById('resizeHandle');
            const colFoto = document.getElementById('colFoto');
            const pageBody = document.getElementById('pageBody');
            const fieldsGrid = document.getElementById('fieldsGrid');

            const MIN_W = 180,
                MAX_W = 560,
                WIDE_AT = 340,
                NARROW_FIELDS = 460;
            const LS_KEY = 'frozeria_foto_w';

            let isDragging = false,
                dragStartX = 0,
                dragStartW = 0;

            const stored = parseInt(localStorage.getItem(LS_KEY) || '0', 10);
            if (stored >= MIN_W && stored <= MAX_W) setWidth(stored);
            syncGrid();

            handle.addEventListener('mousedown', startMouse);
            handle.addEventListener('touchstart', startTouch, {
                passive: false
            });

            function startMouse(e) {
                e.preventDefault();
                beginDrag(e.clientX);
                window.addEventListener('mousemove', moveMouse);
                window.addEventListener('mouseup', endMouse);
            }

            function startTouch(e) {
                e.preventDefault();
                beginDrag(e.touches[0].clientX);
                window.addEventListener('touchmove', moveTouch, {
                    passive: false
                });
                window.addEventListener('touchend', endTouch);
            }

            function moveMouse(e) {
                drag(e.clientX);
            }

            function moveTouch(e) {
                e.preventDefault();
                drag(e.touches[0].clientX);
            }

            function endMouse() {
                stopDrag();
                window.removeEventListener('mousemove', moveMouse);
                window.removeEventListener('mouseup', endMouse);
            }

            function endTouch() {
                stopDrag();
                window.removeEventListener('touchmove', moveTouch);
                window.removeEventListener('touchend', endTouch);
            }

            function beginDrag(x) {
                isDragging = true;
                dragStartX = x;
                dragStartW = colFoto.getBoundingClientRect().width;
                handle.classList.add('dragging');
                document.body.classList.add('is-resizing');
            }

            function drag(x) {
                if (!isDragging) return;
                const delta = x - dragStartX;
                const bodyW = pageBody.getBoundingClientRect().width;
                let w = Math.max(MIN_W, Math.min(MAX_W, Math.min(dragStartW + delta, bodyW - 300)));
                setWidth(w);
                syncGrid();
            }

            function stopDrag() {
                if (!isDragging) return;
                isDragging = false;
                handle.classList.remove('dragging');
                document.body.classList.remove('is-resizing');
                localStorage.setItem(LS_KEY, Math.round(colFoto.getBoundingClientRect().width));
            }

            function setWidth(w) {
                colFoto.style.width = w + 'px';
                colFoto.classList.toggle('wide', w >= WIDE_AT);
            }

            function syncGrid() {
                if (!fieldsGrid) return;
                const rightW = pageBody.getBoundingClientRect().width - colFoto.getBoundingClientRect().width;
                fieldsGrid.style.gridTemplateColumns = (rightW < NARROW_FIELDS) ? '1fr' : '1fr 1fr';
            }

            window.addEventListener('resize', syncGrid);
        })();
    </script>

@endsection
