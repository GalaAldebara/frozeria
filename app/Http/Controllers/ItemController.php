<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Kategori;
use App\Models\Satuan;
use App\Models\StokBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
        public function index(Request $request)
    {
        $query = Item::with('kategori');

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->kategori_id) {
            $query->where('kategori_id', $request->kategori_id);
        }

        $items = $query->latest()->get();

        $kategori = Kategori::all();

        $stokMenipis = Item::where('stok', '<', 20)
            ->where('stok', '>', 0)
            ->count();

        $stokHabis = Item::where('stok', 0)->count();

        $totalBarang = Item::count();

        $totalKategori = Kategori::count();

        return view('items.index', compact(
            'items',
            'kategori',
            'stokMenipis',
            'stokHabis',
            'totalBarang',
            'totalKategori',
        ));
    }

    public function create()
    {
        $kategori = Kategori::all();
        $satuan = Satuan::all();

        return view('items.create', compact('kategori', 'satuan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'harga_beli' => 'required|numeric',
            'kategori_id' => 'required|exists:kategoris,id',
            'satuan_id' => 'required|exists:satuan,id',
            'foto' => 'nullable|image',
            'deskripsi' => 'nullable',
            'lokasi' => 'nullable'
        ]);

        $foto = null;

        if ($request->hasFile('foto')) {

            $foto = $request->file('foto')
                ->store('items', 'public');

        }

        $item = Item::create([
            'kategori_id' => $request->kategori_id,
            'satuan_id' => $request->satuan_id,
            'user_id' => Auth::id(),
            'name' => $request->name,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'harga_beli' => $request->harga_beli,
            'foto' => $foto,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
        ]);

        StokBarang::create([
            'item_id' => $item->id,
            'user_id' => Auth::id(),
            'tipe' => 'MASUK',
            'jumlah' => $request->stok,
            'stok_sebelum' => 0,
            'stok_sesudah' => $request->stok,
            'keterangan' => 'Tambah barang baru'
        ]);

        return redirect()
            ->route('items.index')
            ->with('success', 'Barang berhasil ditambahkan');
    }

    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    public function edit(Item $item)
    {
        $kategori = Kategori::all();
        $satuan = Satuan::all();

        return view('items.edit', compact(
            'item',
            'kategori',
            'satuan'
        ));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'harga_beli' => 'required|numeric',
            'kategori_id' => 'required|exists:kategoris,id',
            'satuan_id' => 'required|exists:satuan,id',
            'foto' => 'nullable|image',
            'deskripsi' => 'nullable',
            'lokasi' => 'nullable'
        ]);

        $stokSebelum = $item->stok;
        $stokSesudah = $request->stok;

        $foto = $item->foto;

        if ($request->hasFile('foto')) {

            $foto = $request->file('foto')
                ->store('items', 'public');

        }

        $item->update([
            'kategori_id' => $request->kategori_id,
            'satuan_id' => $request->satuan_id,
            'name' => $request->name,
            'stok' => $stokSesudah,
            'harga' => $request->harga,
            'harga_beli' => $request->harga_beli,
            'foto' => $foto,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
        ]);

        if ($stokSebelum != $stokSesudah) {

            $tipe = $stokSesudah > $stokSebelum
                ? 'MASUK'
                : 'KELUAR';

            StokBarang::create([
                'item_id' => $item->id,
                'user_id' => Auth::id(),
                'tipe' => $tipe,
                'jumlah' => abs($stokSesudah - $stokSebelum),
                'stok_sebelum' => $stokSebelum,
                'stok_sesudah' => $stokSesudah,
                'keterangan' => 'Update stok barang'
            ]);
        }

        return redirect()
            ->route('items.index')
            ->with('success', 'Barang berhasil diupdate');
    }

        public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index');
    }
}
