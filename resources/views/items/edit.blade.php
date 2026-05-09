@extends('layouts.app')

@section('content')

    <div style="
        padding: 20px;
        background: #f5f5f5;
        min-height: 100vh;
    ">

        {{-- HEADER --}}
        <div
            style="
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        ">

            <a href="{{ route('items.index') }}"
                style="
                border: 1px solid #ccc;
                padding: 8px 12px;
                text-decoration: none;
                color: #333;
                background: white;
                border-radius: 4px;
            ">
                ← Kembali
            </a>

            <h2 style="margin: 0;">
                {{ isset($item) ? 'Edit Barang' : 'Tambah Barang Baru' }}
            </h2>

        </div>

        {{-- ERROR --}}
        @if ($errors->any())
            <div
                style="
                background: #f8d7da;
                color: #842029;
                padding: 15px;
                margin-bottom: 20px;
                border-radius: 5px;
            ">

                <ul style="margin: 0; padding-left: 20px;">

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>
        @endif

        {{-- FORM --}}
        <form action="{{ isset($item) ? route('items.update', $item->id) : route('items.store') }}" method="POST"
            enctype="multipart/form-data">

            @csrf

            @if (isset($item))
                @method('PUT')
            @endif

            {{-- FOTO --}}
            <div
                style="
                background: white;
                border: 1px dashed #ccc;
                padding: 30px;
                text-align: center;
                margin-bottom: 25px;
            ">

                <div style="margin-bottom: 15px;">

                    @if (isset($item) && $item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}" width="150"
                            style="
                            border-radius: 10px;
                            object-fit: cover;
                            border: 1px solid #ddd;
                        ">
                    @else
                        <div
                            style="
                            width: 120px;
                            height: 120px;
                            border: 1px solid #ddd;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            margin: auto;
                            color: #999;
                            background: #fafafa;
                        ">
                            No Image
                        </div>
                    @endif

                </div>

                <div style="
                    color: #666;
                    margin-bottom: 15px;
                ">
                    Klik untuk memilih foto
                </div>

                <input type="file" name="foto">

            </div>

            {{-- GRID --}}
            <div
                style="
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 20px;
            ">

                {{-- NAMA --}}
                <div>

                    <label>Nama Barang *</label>

                    <input type="text" name="name" value="{{ old('name', $item->name ?? '') }}" required
                        style="
                        width: 100%;
                        padding: 10px;
                        margin-top: 5px;
                        border: 1px solid #ccc;
                    ">

                </div>

                {{-- KATEGORI --}}
                <div>

                    <label>Kategori *</label>

                    <select name="kategori_id" required
                        style="
                        width: 100%;
                        padding: 10px;
                        margin-top: 5px;
                        border: 1px solid #ccc;
                    ">

                        <option value="">
                            Pilih kategori
                        </option>

                        @foreach ($kategori as $k)
                            <option value="{{ $k->id }}"
                                {{ old('kategori_id', $item->kategori_id ?? '') == $k->id ? 'selected' : '' }}>
                                {{ $k->nama }}
                            </option>
                        @endforeach

                    </select>

                </div>

                {{-- SATUAN --}}
                <div>

                    <label>Satuan *</label>

                    <select name="satuan_id" required
                        style="
                        width: 100%;
                        padding: 10px;
                        margin-top: 5px;
                        border: 1px solid #ccc;
                    ">

                        <option value="">
                            Pilih satuan
                        </option>

                        @foreach ($satuan as $s)
                            <option value="{{ $s->id }}"
                                {{ old('satuan_id', $item->satuan_id ?? '') == $s->id ? 'selected' : '' }}>
                                {{ $s->kode }}
                            </option>
                        @endforeach

                    </select>

                </div>

                {{-- STOK --}}
                <div>

                    <label>Jumlah stok *</label>

                    <input type="number" name="stok" value="{{ old('stok', $item->stok ?? 0) }}" required
                        style="
                        width: 100%;
                        padding: 10px;
                        margin-top: 5px;
                        border: 1px solid #ccc;
                    ">

                </div>

                {{-- STOK MINIMUM --}}
                <div>

                    <label>Stok minimum</label>

                    <input type="number" name="stok_minimum" value="{{ old('stok_minimum', 20) }}"
                        style="
                        width: 100%;
                        padding: 10px;
                        margin-top: 5px;
                        border: 1px solid #ccc;
                    ">

                </div>

                {{-- HARGA --}}
                <div>

                    <label>Harga jual (Rp)</label>

                    <input type="number" name="harga" value="{{ old('harga', $item->harga ?? 0) }}"
                        style="
                        width: 100%;
                        padding: 10px;
                        margin-top: 5px;
                        border: 1px solid #ccc;
                    ">

                </div>

                {{-- HARGA BELI --}}
                <div>

                    <label>Harga beli (Rp)</label>

                    <input type="number" name="harga_beli" value="{{ old('harga_beli', $item->harga_beli ?? 0) }}"
                        style="
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
        ">

                </div>

                {{-- LOKASI --}}
                <div>

                    <label>Lokasi simpan</label>

                    <input type="text" name="lokasi" value="{{ old('lokasi', $item->lokasi ?? '') }}"
                        style="
                        width: 100%;
                        padding: 10px;
                        margin-top: 5px;
                        border: 1px solid #ccc;
                    ">

                </div>

            </div>

            {{-- DESKRIPSI --}}
            <div style="margin-top: 20px;">

                <label>Deskripsi</label>

                <textarea name="deskripsi" rows="5"
                    style="
                    width: 100%;
                    padding: 10px;
                    margin-top: 5px;
                    border: 1px solid #ccc;
                ">{{ old('deskripsi', $item->deskripsi ?? '') }}</textarea>

            </div>

            {{-- BUTTON --}}
            <div
                style="
                margin-top: 25px;
                display: flex;
                justify-content: flex-end;
                gap: 10px;
            ">

                <a href="{{ route('items.index') }}"
                    style="
                    padding: 10px 20px;
                    border: 1px solid #999;
                    text-decoration: none;
                    color: #333;
                    background: white;
                    border-radius: 4px;
                ">
                    Batal
                </a>

                <button type="submit"
                    style="
                    padding: 10px 20px;
                    background: #8bc34a;
                    color: white;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                ">
                    {{ isset($item) ? 'Update Barang' : 'Simpan Barang' }}
                </button>

            </div>

        </form>

    </div>

@endsection
