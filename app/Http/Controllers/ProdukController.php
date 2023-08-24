<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = produk::all();
        return view('produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('isAdmin');
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('isAdmin');
        $validatedData = $request->validate([
            'nama' => 'required|max:50',
            'deskripsi' => 'required|max:255',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'foto' => 'required|image|mimes:jpeg,jpg,png'
        ]);

        $fileName = time() . $request->foto->getClientOriginalName();
        $request->foto->move(public_path('/images/produk'), $fileName);
        $validatedData['foto'] = $fileName;
        $newProduk = produk::create($validatedData);

        return redirect()->route('produk.index')->with('success', "$newProduk->nama berhasil disimpan ke database");
    }

    /**
     * Display the specified resource.
     */
    public function show(produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(produk $produk)
    {
        $this->authorize('isAdmin');
        return view('produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, produk $produk)
    {
        $this->authorize('isAdmin');
        $validatedData = $request->validate([
            'nama' => 'required|max:50',
            'deskripsi' => 'required|max:255',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'foto' => 'image|mimes:jpeg,jpg,png'
        ]);

        if ($request->foto) {
            $image_path = public_path('images/produk/' . $produk->foto);
            File::exists($image_path) && File::delete($image_path);

            $fileName = time() . $request->foto->getClientOriginalName();
            $request->foto->move(public_path('/images/produk'), $fileName);
            $validatedData['foto'] = $fileName;
            $newProduk = $produk->update($validatedData);
        } else {
            $newProduk = $produk->update($validatedData);
        }

        return redirect()->route('produk.index')->with('success', "$produk->nama berhasil diupdate di database");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(produk $produk)
    {
        $this->authorize('isAdmin');
        $image_path = public_path('images/produk/' . $produk->foto);

        File::exists($image_path) && File::delete($image_path);

        $deletedProduk = $produk->delete();

        return redirect()->route('produk.index')->with('success', "Produk berhasil dihapus database");
    }
}
