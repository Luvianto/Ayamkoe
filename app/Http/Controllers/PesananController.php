<?php

namespace App\Http\Controllers;

use App\Models\pembayaran;
use App\Models\pesanan;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function createPesanan(pembayaran $pembayaran)
    {
        $produk = produk::All();
        return view('pesanan.create')
        ->with('produk',$produk)
        ->with('pembayaran',$pembayaran);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'idProduk' => 'required|string',
            'jumlah' => 'required|integer'
        ]);

        $validatedData['idPembayaran'] = 1;

        $pesanan = pesanan::create($validatedData);
        $namaProduk = $pesanan->produk->nama;
        return redirect()->route('pesanan.show')->with('success', "Pesanan $namaProduk berhasil ditambahkan");
    }

    public function storePesanan(Request $request, pembayaran $pembayaran)
    {
        $validatedData = $request->validate([
            'idProduk' => 'required|string',
            'jumlah' => 'required|integer'
        ]);

        $validatedData['idPembayaran'] = $pembayaran->id;

        $pesanan = pesanan::create($validatedData);
        $namaProduk = $pesanan->produk->nama;
        return redirect()->route('pesanan.show', $pembayaran)->with('success', "Pesanan $namaProduk berhasil ditambahkan");
    }
    /**
     * Display the specified resource.
     */
    public function show(pembayaran $pesanan)
    {
        $pelanggan = DB::select("SELECT id, name, role FROM users where role = 'user'");
        $selectPesanan = pesanan::All();
        // dd($pesanan);
        return view('pesanan.show')
        ->with('pembayaran',$pesanan)
        ->with('pelanggan',$pelanggan)
        ->with('pesanan',$selectPesanan);
    }

    public function showNonEditable(pembayaran $pembayaran)
    {
        $selectPesanan = pesanan::All();
        // dd($pesanan);
        return view('pesanan.showNonEditable')
        ->with('pembayaran',$pembayaran)
        ->with('pesanan',$selectPesanan);
    }

    public function showEditKaryawan(pembayaran $pembayaran)
    {
        $selectPesanan = pesanan::All();
        // dd($pesanan);
        return view('pesanan.showEditKaryawan')
        ->with('pembayaran',$pembayaran)
        ->with('pesanan',$selectPesanan);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pesanan $pesanan)
    {
        $produk = produk::All();
        return view('pesanan.edit')->with('pesanan',$pesanan)->with('produk',$produk);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pesanan $pesanan)
    {
        $validatedData = $request->validate([
            'idProduk' => 'required|string',
            'jumlah' => 'required|integer'
        ]);

        $pesanan->update($validatedData);
        return redirect()->route('pesanan.show', $pesanan->idPembayaran)->with('success',"Pesanan berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pesanan $pesanan)
    {
        $pesanan->delete();
        return redirect()->route('pesanan.show', $pesanan->idPembayaran)->with('success',"Pesanan berhasil diubah");
    }
}
