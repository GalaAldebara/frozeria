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

        // ✅ Ubah get() → paginate() + appends()
        $items = $query->latest()->paginate(10)->appends(request()->query());

        $kategori = Kategori::all();
        $stokMenipis = Item::where('stok', '<', 20)->where('stok', '>', 0)->count();
        $stokHabis = Item::where('stok', 0)->count();
        $totalBarang = Item::count();
        $totalKategori = Kategori::count();

        return view('items.index', compact(
            'items', 'kategori', 'stokMenipis', 'stokHabis', 'totalBarang', 'totalKategori',
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

                'stok' => 'required|integer|min:0',

                'weight' => 'nullable|string',

                'harga' => 'required|numeric|min:0',
                'harga_beli' => 'required|numeric|min:0',

                'kategori_id' => 'required|exists:kategoris,id',
                'satuan_id' => 'required|exists:satuan,id',

                'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

                'deskripsi' => 'nullable',
                'lokasi' => 'nullable'
            ]);

            $foto = null;

            if ($request->hasFile('foto')) {

                $foto = $request->file('foto')
                    ->store('items', 'public');

            }

            $kategori = Kategori::findOrFail($request->kategori_id);
            $satuan = Satuan::findOrFail($request->satuan_id);

            $prefix =
                strtoupper($kategori->kode) .
                '-' .
                strtoupper($satuan->kode);

            $itemsDenganPrefix = Item::where(
                'kode_item',
                'like',
                $prefix . '-%'
            )->pluck('kode_item');

            $nomorTerbesar = 0;

            foreach ($itemsDenganPrefix as $kode) {

                $parts = explode('-', $kode);

                $nomor = (int) end($parts);

                if ($nomor > $nomorTerbesar) {

                    $nomorTerbesar = $nomor;

                }
            }

            $nomorUrut = $nomorTerbesar + 1;

            /*
            |--------------------------------------------------------------------------
            | Generate kode item
            |--------------------------------------------------------------------------
            | Contoh:
            | FV-PCS-001
            |--------------------------------------------------------------------------
            */

            $kodeItem =
                $prefix .
                '-' .
                str_pad($nomorUrut, 3, '0', STR_PAD_LEFT);

            /*
            |--------------------------------------------------------------------------
            | Simpan Item
            |--------------------------------------------------------------------------
            */

            $item = Item::create([
                'kode_item' => $kodeItem,

                'kategori_id' => $request->kategori_id,
                'satuan_id' => $request->satuan_id,
                'user_id' => Auth::id(),

                'name' => $request->name,
                'stok' => $request->stok,

                'weight' => $request->weight,

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
                'weight' => 'nullable|string',
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

            // upload foto baru
            if ($request->hasFile('foto')) {

                $foto = $request->file('foto')
                    ->store('items', 'public');

            }

            $kategori = Kategori::findOrFail($request->kategori_id);
            $satuan = Satuan::findOrFail($request->satuan_id);

            $kodeKategori = strtoupper($kategori->kode);
            $kodeSatuan = strtoupper($satuan->kode);

            $prefix = $kodeKategori . '-' . $kodeSatuan;

            // cek apakah kategori / satuan berubah
            $kategoriBerubah = $item->kategori_id != $request->kategori_id;
            $satuanBerubah = $item->satuan_id != $request->satuan_id;

            $kodeItem = $item->kode_item;

            // generate ulang hanya jika kategori/satuan berubah
            if ($kategoriBerubah || $satuanBerubah) {

                $lastItem = Item::where('kode_item', 'like', $prefix . '-%')
                    ->orderBy('id', 'desc')
                    ->first();

                $nomorUrut = 1;

                if ($lastItem) {

                    $lastNumber = (int) substr($lastItem->kode_item, -3);

                    $nomorUrut = $lastNumber + 1;
                }

                $kodeItem = $prefix . '-' . str_pad($nomorUrut, 3, '0', STR_PAD_LEFT);
            }

            // update item
            $item->update([
                'kategori_id' => $request->kategori_id,
                'satuan_id' => $request->satuan_id,
                'name' => $request->name,
                'kode_item' => $kodeItem,
                'stok' => $stokSesudah,
                'weight' => $request->weight,
                'harga' => $request->harga,
                'harga_beli' => $request->harga_beli,
                'foto' => $foto,
                'deskripsi' => $request->deskripsi,
                'lokasi' => $request->lokasi,
            ]);

            // simpan histori stok
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
