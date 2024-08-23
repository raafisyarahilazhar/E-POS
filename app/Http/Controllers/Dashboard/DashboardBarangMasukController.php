<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class DashboardBarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.barang-masuk.index', [
            'barang' => Barang::all(),
            'masuk' => BarangMasuk::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.barang-masuk.create', [
            'barang' => Barang::all(),
            'masuk' => BarangMasuk::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // \Log::info('Request data: ', $request->all());

        // Validate the request data
        $request->validate([
            'barangs_id' => 'required|exists:barangs,id',
            'jumlah_barang' => 'required|integer',
            'satuan' => 'required'
        ]);

        // Insert Barang Masuk
        $barangMasuk = BarangMasuk::create([
            'barangs_id' => $request->barangs_id,
            'jumlah_barang' => $request->jumlah_barang,
            'satuan' => $request->satuan
        ]);

        // Log after insert
        // \Log::info('Barang Masuk Created: ', $barangMasuk->toArray());

        // Update stok barang
        $barang = Barang::findOrFail($request->barangs_id);
        $barang->stok_barang += $request->jumlah_barang;
        $barang->save();

        // Log after update
        // \Log::info('Barang Updated: ', $barang->toArray());

        return redirect()->route('barang-masuk.index');
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
