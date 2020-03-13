<?php

namespace App\Http\Controllers\Dashboard\Transaksi;

use App\Http\Controllers\Controller;
use App\KategoriPekerjaan;
use App\KategoriPekerjaanMaster;
use App\Perbaikan;
use App\Satuan;
use App\UraianPekerjaan;
use Illuminate\Http\Request;

class UraianController extends Controller
{
    public function create($id, $kategoriPekerjaanID, Request $request)
    {
        $transaksi = Perbaikan::findOrFail($id);
        $kategoriPekerjaanMasters = KategoriPekerjaanMaster::select('nama')->get();
        $satuan = Satuan::select('nama')->get();
        $kategoriPekerjaan = KategoriPekerjaan::findOrFail($kategoriPekerjaanID);

        return view('dashboard.transaksi.uraian.create', compact('transaksi', 'kategoriPekerjaanMasters', 'satuan', 'kategoriPekerjaan'));
    }

    public function store($id, $kategoriPekerjaanID, Request $request)
    {
        $request->validate([
            'deskripsi' => 'required',
            'volume_nilai' => 'required',
            'volume_satuan' => 'required',
            'harga' => 'required'
        ]);

        $transaksi = Perbaikan::findOrFail($id);
        $kategoriPekerjaan = KategoriPekerjaan::findOrFail($kategoriPekerjaanID);

        $uraianPekerjaan = UraianPekerjaan::create([
            'kategori_pekerjaan_id' => $kategoriPekerjaan->id,
            'deskripsi' => $request->input('deskripsi'),
            'volume_nilai' =>  $request->input('volume_nilai'),
            'volume_satuan' =>  $request->input('volume_satuan'),
            'harga' =>  $request->input('harga')
        ]);

        return redirect()->route('dashboard.transaksi.show', $transaksi->id);
    }
}
