@extends('layouts.app')

@section('content')
    <div style="
        padding: 20px;
        background: #f5f5f5;
        min-height: 100vh;
    ">

        {{-- TOP ACTION --}}
        <div
            style="
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        ">

            <div>

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

            </div>

            <div style="
                display: flex;
                gap: 10px;
            ">

                <a href="{{ route('items.edit', $item->id) }}"
                    style="
                    border: 1px solid #0d6efd;
                    color: #0d6efd;
                    padding: 8px 15px;
                    text-decoration: none;
                    border-radius: 4px;
                    background: white;
                ">
                    Edit Barang
                </a>

                <form action="{{ route('items.destroy', $item->id) }}" method="POST">

                    @csrf
                    @method('DELETE')

                    <button type="submit" onclick="return confirm('Yakin ingin menghapus barang ini?')"
                        style="
                        border: 1px solid #dc3545;
                        color: #dc3545;
                        padding: 8px 15px;
                        background: white;
                        border-radius: 4px;
                        cursor: pointer;
                    ">
                        Hapus
                    </button>

                </form>

            </div>

        </div>

        {{-- TITLE --}}
        <h2 style="
            margin-bottom: 25px;
            color: #333;
        ">
            Detail Barang
        </h2>

        {{-- HEADER --}}
        <div
            style="
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
            align-items: flex-start;
        ">

            {{-- FOTO --}}
            <div>

                @if ($item->foto)
                    <img src="{{ asset('storage/' . $item->foto) }}" width="120" height="120"
                        style="
                        object-fit: cover;
                        border: 1px solid #ddd;
                        background: white;
                    ">
                @else
                    <div
                        style="
                        width: 120px;
                        height: 120px;
                        border: 1px solid #ddd;
                        background: white;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        color: #999;
                    ">
                        No Image
                    </div>
                @endif

            </div>

            {{-- INFO --}}
            <div>

                <h1
                    style="
                    margin: 0 0 10px 0;
                    font-size: 32px;
                    color: #222;
                ">
                    {{ $item->name }}
                </h1>

                <span
                    style="
                    background: #f1f1f1;
                    border: 1px solid #ccc;
                    padding: 5px 10px;
                    border-radius: 4px;
                    font-size: 14px;
                ">
                    {{ $item->kategori->nama ?? '-' }}
                </span>

            </div>

        </div>

        {{-- DETAIL GRID --}}
        <div
            style="
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 15px;
        ">

            {{-- STOK --}}
            <div
                style="
                background: white;
                border: 1px solid #ddd;
                padding: 15px;
            ">

                <div
                    style="
                    color: #777;
                    margin-bottom: 8px;
                    font-size: 14px;
                ">
                    Jumlah stok
                </div>

                <div
                    style="
                    font-size: 24px;
                    font-weight: bold;
                    color: #222;
                ">
                    {{ $item->stok }} {{ $item->satuan->kode ?? '' }}
                </div>

            </div>

            {{-- STOK MINIMUM --}}
            <div
                style="
                background: white;
                border: 1px solid #ddd;
                padding: 15px;
            ">

                <div
                    style="
                    color: #777;
                    margin-bottom: 8px;
                    font-size: 14px;
                ">
                    Stok minimum
                </div>

                <div
                    style="
                    font-size: 24px;
                    font-weight: bold;
                    color: #222;
                ">
                    20 {{ $item->satuan->kode ?? '' }}
                </div>

            </div>

            {{-- HARGA BELI --}}
            <div style="
        background: white;
        border: 1px solid #ddd;
        padding: 15px;
    ">

                <div
                    style="
            color: #777;
            margin-bottom: 8px;
            font-size: 14px;
        ">
                    Harga beli
                </div>

                <div style="
            font-size: 24px;
            font-weight: bold;
            color: #222;
        ">
                    Rp {{ number_format($item->harga_beli, 0, ',', '.') }}
                </div>

            </div>

            {{-- HARGA JUAL --}}
            <div
                style="
                background: white;
                border: 1px solid #ddd;
                padding: 15px;
            ">

                <div
                    style="
                    color: #777;
                    margin-bottom: 8px;
                    font-size: 14px;
                ">
                    Harga jual
                </div>

                <div
                    style="
                    font-size: 24px;
                    font-weight: bold;
                    color: #222;
                ">
                    Rp {{ number_format($item->harga, 0, ',', '.') }}
                </div>

            </div>

            {{-- DESKRIPSI --}}
            <div
                style="
            background: white;
            border: 1px solid #ddd;
            padding: 15px;
        ">

                <div
                    style="
                color: #777;
                margin-bottom: 10px;
                font-size: 14px;
            ">
                    Deskripsi
                </div>

                <div style="
                color: #333;
                line-height: 1.7;
            ">
                    {{ $item->deskripsi ?? 'Tidak ada deskripsi.' }}
                </div>

            </div>

        </div>
    @endsection
