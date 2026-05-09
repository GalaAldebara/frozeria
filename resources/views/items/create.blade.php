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
        .form-page-header {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 28px;
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
            padding: 8px 14px;
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

        .form-page-title {
            font-family: 'Fraunces', serif;
            font-size: 22px;
            font-weight: 600;
            color: var(--gray-900);
            letter-spacing: -0.3px;
        }

        /* ── ERROR ALERT ── */
        .alert-error {
            background: var(--red-50);
            border: 1.5px solid #fca5a5;
            border-radius: var(--radius-sm);
            padding: 14px 16px;
            margin-bottom: 24px;
        }

        .alert-error-header {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            font-weight: 600;
            color: var(--red-700);
            margin-bottom: 8px;
        }

        .alert-error-header svg {
            width: 16px;
            height: 16px;
            stroke: var(--red-700);
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            flex-shrink: 0;
        }

        .alert-error ul {
            margin: 0;
            padding-left: 18px;
            font-size: 13px;
            color: var(--red-700);
            line-height: 1.7;
        }

        /* ── LAYOUT ── */
        .form-layout {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 20px;
            align-items: start;
        }

        /* ── CARD ── */
        .form-card {
            background: var(--white);
            border: 1.5px solid var(--gray-200);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }

        .form-card-header {
            padding: 14px 20px;
            border-bottom: 1px solid var(--gray-200);
            background: var(--gray-50);
        }

        .form-card-header h3 {
            font-size: 13px;
            font-weight: 600;
            color: var(--gray-400);
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin: 0;
        }

        .form-card-body {
            padding: 20px;
        }

        /* ── FOTO UPLOAD ── */
        .foto-preview-wrap {
            width: 100%;
            aspect-ratio: 1;
            border-radius: 10px;
            overflow: hidden;
            background: var(--gray-100);
            border: 1.5px solid var(--gray-200);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 14px;
            position: relative;
        }

        .foto-preview-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .foto-placeholder {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            color: var(--gray-400);
        }

        .foto-placeholder svg {
            width: 40px;
            height: 40px;
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
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            width: 100%;
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
            margin-top: 8px;
        }

        /* ── FORM FIELDS ── */
        .fields-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
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
            font-size: 13px;
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
            padding: 10px 13px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
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
            resize: vertical;
            min-height: 100px;
        }

        /* input prefix Rp */
        .input-prefix-wrap {
            position: relative;
        }

        .input-prefix-wrap .prefix {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 13px;
            font-weight: 500;
            color: var(--gray-400);
            pointer-events: none;
        }

        .input-prefix-wrap input {
            padding-left: 38px;
        }

        /* ── SECTION DIVIDER ── */
        .section-divider {
            grid-column: 1 / -1;
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 4px 0;
        }

        .section-divider span {
            font-size: 11px;
            font-weight: 600;
            color: var(--gray-400);
            text-transform: uppercase;
            letter-spacing: 0.07em;
            white-space: nowrap;
        }

        .section-divider hr {
            flex: 1;
            border: none;
            border-top: 1px solid var(--gray-200);
        }

        /* ── FORM FOOTER ── */
        .form-footer {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 10px;
            padding: 16px 20px;
            border-top: 1px solid var(--gray-200);
            background: var(--gray-50);
        }

        .btn-cancel {
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            font-weight: 500;
            padding: 10px 20px;
            background: var(--white);
            color: var(--gray-600);
            border: 1.5px solid var(--gray-200);
            border-radius: var(--radius-sm);
            text-decoration: none;
            cursor: pointer;
            transition: background .15s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-cancel:hover {
            background: var(--gray-100);
        }

        .btn-submit {
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            font-weight: 500;
            padding: 10px 24px;
            background: var(--green-500);
            color: var(--white);
            border: none;
            border-radius: var(--radius-sm);
            cursor: pointer;
            transition: background .15s, transform .1s;
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }

        .btn-submit:hover {
            background: var(--green-600);
        }

        .btn-submit:active {
            transform: scale(.98);
        }

        .btn-submit svg,
        .btn-cancel svg {
            width: 15px;
            height: 15px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        @media (max-width: 860px) {
            .form-layout {
                grid-template-columns: 1fr;
            }

            .foto-preview-wrap {
                aspect-ratio: 16/7;
                max-height: 220px;
            }
        }

        @media (max-width: 560px) {
            .fields-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    {{-- ── HEADER ── --}}
    <div class="form-page-header">
        <a href="{{ route('items.index') }}" class="btn-back">
            <svg viewBox="0 0 24 24">
                <polyline points="15 18 9 12 15 6" />
            </svg>
            Kembali
        </a>
        <h1 class="form-page-title">
            {{ isset($item) ? 'Edit Barang' : 'Tambah Barang Baru' }}
        </h1>
    </div>

    {{-- ── ERROR ── --}}
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

    {{-- ── FORM ── --}}
    <form action="{{ isset($item) ? route('items.update', $item->id) : route('items.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @if (isset($item))
            @method('PUT')
        @endif

        <div class="form-layout">

            {{-- ── KOLOM KIRI: FOTO ── --}}
            <div class="form-card">
                <div class="form-card-header">
                    <h3>Foto Produk</h3>
                </div>
                <div class="form-card-body">

                    <div class="foto-preview-wrap" id="fotoPreviewWrap">
                        @if (isset($item) && $item->foto)
                            <img id="fotoPreview" src="{{ asset('storage/' . $item->foto) }}" alt="Foto barang">
                        @else
                            <div class="foto-placeholder" id="fotoPlaceholder">
                                <svg viewBox="0 0 24 24">
                                    <rect x="3" y="3" width="18" height="18" rx="2" />
                                    <circle cx="8.5" cy="8.5" r="1.5" />
                                    <polyline points="21 15 16 10 5 21" />
                                </svg>
                                <span>Belum ada foto</span>
                            </div>
                            <img id="fotoPreview" src="" alt=""
                                style="display:none; width:100%; height:100%; object-fit:cover;">
                        @endif
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
            </div>

            {{-- ── KOLOM KANAN: FIELDS ── --}}
            <div class="form-card">
                <div class="form-card-header">
                    <h3>Informasi Barang</h3>
                </div>
                <div class="form-card-body">
                    <div class="fields-grid">

                        {{-- Nama --}}
                        <div class="form-group">
                            <label>Nama Barang <span class="req">*</span></label>
                            <input type="text" name="name" value="{{ old('name', $item->name ?? '') }}"
                                placeholder="cth. Sosis Sapi Premium" required>
                        </div>

                        {{-- Kategori --}}
                        <div class="form-group">
                            <label>Kategori <span class="req">*</span></label>
                            <select name="kategori_id" required>
                                <option value="">Pilih kategori</option>
                                @foreach ($kategori as $k)
                                    <option value="{{ $k->id }}"
                                        {{ old('kategori_id', $item->kategori_id ?? '') == $k->id ? 'selected' : '' }}>
                                        {{ $k->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Satuan --}}
                        <div class="form-group">
                            <label>Satuan <span class="req">*</span></label>
                            <select name="satuan_id" required>
                                <option value="">Pilih satuan</option>
                                @foreach ($satuan as $s)
                                    <option value="{{ $s->id }}"
                                        {{ old('satuan_id', $item->satuan_id ?? '') == $s->id ? 'selected' : '' }}>
                                        {{ $s->kode }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Divider: Stok --}}
                        <div class="section-divider">
                            <span>Stok</span>
                            <hr>
                        </div>

                        {{-- Jumlah Stok --}}
                        <div class="form-group">
                            <label>Jumlah Stok <span class="req">*</span></label>
                            <input type="number" name="stok" min="0" value="{{ old('stok', $item->stok ?? 0) }}"
                                required>
                        </div>

                        {{-- Stok Minimum --}}
                        <div class="form-group">
                            <label>Stok Minimum</label>
                            <input type="number" name="stok_minimum" min="0"
                                value="{{ old('stok_minimum', $item->stok_minimum ?? 20) }}">
                        </div>

                        {{-- Divider: Harga --}}
                        <div class="section-divider">
                            <span>Harga</span>
                            <hr>
                        </div>

                        {{-- Harga Jual --}}
                        <div class="form-group">
                            <label>Harga Jual</label>
                            <div class="input-prefix-wrap">
                                <span class="prefix">Rp</span>
                                <input type="number" name="harga" min="0"
                                    value="{{ old('harga', $item->harga ?? 0) }}">
                            </div>
                        </div>

                        {{-- Harga Beli --}}
                        <div class="form-group">
                            <label>Harga Beli</label>
                            <div class="input-prefix-wrap">
                                <span class="prefix">Rp</span>
                                <input type="number" name="harga_beli" min="0"
                                    value="{{ old('harga_beli', $item->harga_beli ?? 0) }}">
                            </div>
                        </div>

                        {{-- Divider: Lainnya --}}
                        <div class="section-divider">
                            <span>Lainnya</span>
                            <hr>
                        </div>

                        {{-- Lokasi --}}
                        <div class="form-group field-full">
                            <label>Lokasi Simpan</label>
                            <input type="text" name="lokasi" value="{{ old('lokasi', $item->lokasi ?? '') }}"
                                placeholder="cth. Rak A-3, Freezer 2">
                        </div>

                        {{-- Deskripsi --}}
                        <div class="form-group field-full">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" rows="4" placeholder="Keterangan tambahan tentang barang ini...">{{ old('deskripsi', $item->deskripsi ?? '') }}</textarea>
                        </div>

                    </div>
                </div>

                <div class="form-footer">
                    <a href="{{ route('items.index') }}" class="btn-cancel">
                        <svg viewBox="0 0 24 24">
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                        </svg>
                        Batal
                    </a>
                    <button type="submit" class="btn-submit">
                        <svg viewBox="0 0 24 24">
                            @if (isset($item))
                                <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z" />
                                <polyline points="17 21 17 13 7 13 7 21" />
                                <polyline points="7 3 7 8 15 8" />
                            @else
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            @endif
                        </svg>
                        {{ isset($item) ? 'Update Barang' : 'Simpan Barang' }}
                    </button>
                </div>
            </div>

        </div>
    </form>

    <script>
        /* ── Preview foto sebelum upload ── */
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
    </script>

@endsection
