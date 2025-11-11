<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // Tampil item
    public function index(Request $request)
    {
        // Ambil nilai pencarian dari input form (jika ada)
        $search = $request->input('search');

        // Buat query dasar
        $query = Item::query();

        // Jika ada kata kunci pencarian, filter data
        if (!empty($search)) {
            $query->where('kode', 'like', '%' . $search . '%')
                ->orWhere('nama', 'like', '%' . $search . '%');
        }

        // Ambil hasil (bisa pakai paginate jika ingin)
        $items = $query->orderBy('nama', 'asc')->get();

        // Kirim data ke view
        return view('backend.items.index', compact('items'));
    }

    // Tambah item
    public function create()
    {
        $items = Item::all();
        return view('backend.items.create', compact('items'));
    }

    // Simpan item
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|unique:items,kode',
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'stok' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:1000'
        ], [
            'kode.unique' => 'Kode barang sudah terdaftar!',
            'stok.min' => 'Stok minimal 1!',
            'stok.required' => 'Stok wajib diisi!',
            'harga.min' => 'Harga minimal Rp1000!',
            'harga.required' => 'Harga wajib diisi!',
            'nama.required' => 'Nama barang wajib diisi!',
            'kategori.required' => 'Kategori wajib diisi!',
        ]);

        Item::create($request->all());

        return redirect()->route('brg')->with('success', 'Data barang berhasil ditambahkan!');
    }

    // Edit item
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        // $users = User::all();
        return view('backend.items.edit', compact('item'));
    }

    // Update item
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|string|max:10',
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'stok' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:1000'
        ], [
            'kode.unique' => 'Kode barang sudah terdaftar!',
            'stok.min' => 'Stok minimal 1!',
            'stok.required' => 'Stok wajib diisi!',
            'harga.min' => 'Harga minimal Rp1000!',
            'harga.required' => 'Harga wajib diisi!',
            'nama.required' => 'Nama barang wajib diisi!',
            'kategori.required' => 'Kategori wajib diisi!',
        ]);

        $item = Item::findOrFail($id);
        $item->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'stok' => $request->stok,
            'harga' => $request->harga
        ]);

        return redirect()->route('brg')->with('success', 'Data barang berhasil diperbarui!');
    }

    // Hapus data
    public function delete($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('brg')->with('success', 'Data barang berhasil dihapus!');
    }
}
