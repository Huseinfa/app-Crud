<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    
    public function index()
    {   
        // Menampilkan semua item
        $items = Item::all(); // Mengambil semua item dari database
        return view('items.index', compact('items'));// Mengirim data ke tampilan

    }

    // Menampilkan form untuk membuat item baru
    public function create()
    {
        return view('items.create');
    }

    // Menyimpan item baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        //Item::create($request->all());
        //return redirect()->route('items.index');

        //Hanya masukkan atribut yang diizinkan
        Item::create($request->only(['name', 'description']));
        return redirect()->route('items.index')->with('success', 'Item added successfully.');
    }

    // Menampilkan detail item tertentu
    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    // Menampilkan form untuk mengedit item
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    // Memperbarui item yang ada di database
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $item->update($request->only(['name', 'description']));
        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }

     // Menghapus item dari database
    public function destroy(Item $item)
    {
        //return redirect()->route('items.index');
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
}
