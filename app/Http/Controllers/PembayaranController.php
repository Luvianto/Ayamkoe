<?php

namespace App\Http\Controllers;

use App\Models\pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate as FacadesGate;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (FacadesGate::denies('isUser')) {
            $pembayaran = pembayaran::orderBy('id','ASC')->get();
            $pelanggan = Auth::id();

            $pesanan = DB::select
            ('SELECT idPembayaran, nama, sum(jumlah) as jumlah
            FROM produks
            JOIN pesanans ON produks.id = pesanans.idProduk
            GROUP BY idPembayaran, nama');

            $totalHarga = DB::select
            ('SELECT idPembayaran, sum(jumlah*harga) as totalHarga
            FROM produks
            JOIN pesanans ON produks.id = pesanans.idProduk
            GROUP BY idPembayaran');

            // dd($pesanan);
            // dd($totalHarga)

            return view('pembayaran.index', compact('pembayaran'))
            ->with('pesanan',$pesanan)
            ->with('totalHarga',$totalHarga)
            ->with('pelanggan',$pelanggan);
        } else {
            return redirect()->route('pembayaran.indexPelanggan');
        }
    }

    public function indexPelanggan()
    {
        if (FacadesGate::denies('isKaryawan')) {
            $pembayaran = pembayaran::orderBy('id','ASC')->get();
            $pelanggan = Auth::id();

            $pesanan = DB::select
            ('SELECT idPembayaran, nama, sum(jumlah) as jumlah
            FROM produks
            JOIN pesanans ON produks.id = pesanans.idProduk
            GROUP BY idPembayaran, nama');

            $totalHarga = DB::select
            ('SELECT idPembayaran, sum(jumlah*harga) as totalHarga
            FROM produks
            JOIN pesanans ON produks.id = pesanans.idProduk
            GROUP BY idPembayaran');

            // dd($pesanan);
            // dd($totalHarga)

            return view('pembayaran.indexPelanggan', compact('pembayaran'))
            ->with('pesanan',$pesanan)
            ->with('totalHarga',$totalHarga)
            ->with('pelanggan',$pelanggan);
        }else{
            return redirect()->route('pembayaran.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['metodePembayaran'] = 'COD';

        $data['idUser'] = Auth::id();
        $data['status'] = 'Pending';
        $pembayaran = pembayaran::create($data);

        return redirect()->route('pesanan.show', $pembayaran)->with('success',"Pesanan masih kosong, isi terlebih dahulu");
    }

    public function setMetode(Request $request, pembayaran $pembayaran)
    {
        $validatedData = $request->validate([
            'metodePembayaran' =>'required|max:20'
        ]);
        if($request->idPelanggan){
            $validatedData['idUser'] = $request->idPelanggan;
        }
        $pembayaran->update($validatedData);

        return redirect()->route('pembayaran.index')->with('success',"Pesanan berhasi dikirim");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pembayaran $pembayaran)
    {
        if (FacadesGate::denies('isUser')) {
            return view('pembayaran.editStatus', compact('pembayaran'));
        }else{
            return redirect()->route('pembayaran.indexPelanggan');
        }
    }

    public function editPesanan(pembayaran $pembayaran)
    {
        if (FacadesGate::denies('isUser')) {
            return view('pesanan.edit', compact('pembayaran'));
        }else{
            return redirect()->route('pembayaran.indexPelanggan');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pembayaran $pembayaran)
    {
        if (FacadesGate::denies('isUser')) {
            $validatedData = $request->validate([
                'status' =>'required|max:20'
            ]);
            $pembayaran->update($validatedData);
            return redirect()->route('pembayaran.index')->with('success', "Status berhasil diupdate di database");
        }else{
            return redirect()->route('pembayaran.indexPelanggan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect()->route('pembayaran.index')->with('success', "Pesanan dibatalkan");
    }
}
