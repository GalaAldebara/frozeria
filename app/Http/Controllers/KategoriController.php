<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Item;
use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Kategori::withCount('items');

        if ($request->search) {

            $query->where('nama', 'like', '%' . $request->search . '%');

        }

        $kategori = $query->latest()->get();

        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:kategoris,nama',
            'deskripsi' => 'nullable'
        ]);

        $nama = strtoupper($request->nama);

        $kata = explode(' ', $nama);

        if (count($kata) > 1) {

            $kode = '';

            foreach ($kata as $k) {
                $kode .= substr($k, 0, 1);
            }

        } else {

            $kode = substr($nama, 0, 3);
        }

        $originalKode = $kode;
        $counter = 1;

        while (Kategori::where('kode', $kode)->exists()) {

            $kode = $originalKode . $counter;

            $counter++;
        }

        Kategori::create([
            'nama' => $request->nama,
            'kode' => $kode,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    public function show(Kategori $kategori)
    {
        return view('kategori.show', compact('kategori'));
    }

    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama' => 'required|unique:kategoris,nama,' . $kategori->id,
            'deskripsi' => 'nullable'
        ]);

        /*
        |--------------------------------------------------------------------------
        | GENERATE ULANG KODE
        |--------------------------------------------------------------------------
        */

        $nama = strtoupper($request->nama);

        $kata = explode(' ', $nama);

        if (count($kata) > 1) {

            $kode = '';

            foreach ($kata as $k) {
                $kode .= substr($k, 0, 1);
            }

        } else {

            $kode = substr($nama, 0, 3);
        }

        /*
        |--------------------------------------------------------------------------
        | CEK DUPLIKAT KODE
        |--------------------------------------------------------------------------
        */

        $originalKode = $kode;
        $counter = 1;

        while (
            Kategori::where('kode', $kode)
                ->where('id', '!=', $kategori->id)
                ->exists()
        ) {

            $kode = $originalKode . $counter;

            $counter++;
        }

        $kodeLama = $kategori->kode;

        // update kategori
        $kategori->update([
            'nama' => $request->nama,
            'kode' => $kode,
            'deskripsi' => $request->deskripsi
        ]);

        /*
        |--------------------------------------------------------------------------
        | UPDATE SEMUA KODE ITEM
        |--------------------------------------------------------------------------
        */

        if ($kodeLama != $kode) {

            foreach ($kategori->items as $item) {

                $nomor = substr($item->kode_item, -3);

                $kodeBaru =
                    $kode . '-' .
                    $item->satuan->kode . '-' .
                    $nomor;

                $item->update([
                    'kode_item' => strtoupper($kodeBaru)
                ]);
            }
        }

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        // hapus semua foto item
        foreach ($kategori->items as $item) {

            if (
                $item->foto &&
                Storage::disk('public')->exists($item->foto)
            ) {

                Storage::disk('public')->delete($item->foto);
            }
        }

        // item otomatis ikut terhapus karena cascadeOnDelete()
        $kategori->delete();

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori dan semua item terkait berhasil dihapus');
    }
}