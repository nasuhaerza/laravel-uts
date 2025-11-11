<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $item = Item::all();
        return view('backend.items.index', compact('item'));
    }

    public function create()
    {
        return view('backend.items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required|string|max:255',
            'kode'  => 'required|string|unique:items,kode',
            'harga' => 'required|numeric',
            'stok'  => 'required|integer|min:0',
        ]);

        Item::create($request->all());

        return redirect()->route('item')->with('success', 'Data barang berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('backend.items.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'  => 'required|string|max:255',
            'kode'  => 'required|string|unique:items,kode,' . $id,
            'harga' => 'required|numeric',
            'stok'  => 'required|integer|min:0',
        ]);

        $item = Item::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('item')->with('success', 'Data barang berhasil diperbarui.');
    }

    public function delete($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('item')->with('success', 'Data barang berhasil dihapus.');
    }
}
