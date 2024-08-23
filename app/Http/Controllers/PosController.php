<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\Transaksi;
use DB;

class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kasir.index', [
            'barangs' => Barang::all(),
            'transaksi' => Transaksi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'items' => 'required|array',
            'items.*.barangs_id' => 'required|exists:barangs,id',
            'items.*.jumlah_barang' => 'required|integer|min:1',
            'cash' => 'required|numeric|min:0',
        ]);
    
        try {
            // Membuat transaksi baru
            $transaksi = Transaksi::create([
                'total_harga' => $request->total_harga,
                'cash' => $request->cash
            ]);
    
            // Loop melalui item yang dibeli
            foreach ($request->items as $item) {
                $barang = Barang::findOrFail($item['barangs_id']);
    
                // Kurangi stok barang
                $barang->stok_barang -= $item['jumlah_barang'];
                $barang->save();
    
                // Catat barang keluar
                BarangKeluar::create([
                    'transaksis_id' => $transaksi->id,
                    'barangs_id' => $item['barangs_id'],
                    'jumlah_barang' => $item['jumlah_barang']
                ]);
            }
    
            // Calculate change
            $change = $request->cash - $request->total_harga;
    
            return response()->json(['success' => true, 'transaksis_id' => $transaksi->id, 'change' => $change], 200);
    
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
