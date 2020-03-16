<?php

namespace App\Http\Controllers\Dashboard\Transaksi;

use App\Http\Controllers\Controller;
use App\KategoriPekerjaan;
use App\KategoriPekerjaanMaster;
use App\Perbaikan;
use App\Satuan;
use App\UraianPekerjaan;
use Illuminate\Http\Request;

class KategoriPekerjaanController extends Controller
{
    public function create($id, Request $request)
    {
        $satuan = Satuan::get();
        $transaksi = Perbaikan::findOrFail($id);
        $kategoriPekerjaanMasters = KategoriPekerjaanMaster::select('nama')->get();

        return view('dashboard.transaksi.kategori-pekerjaan.create', compact('transaksi', 'kategoriPekerjaanMasters', 'satuan'));
    }

    public function store($id, Request $request)
    {
        $transaksi = Perbaikan::findOrFail($id);
        $kategoriPekerjaan = KategoriPekerjaan::create([
            'nama' => $request->input('kategori_pekerjaan'),
            'deskripsi' => $request->input('kategori_pekerjaan_deskripsi'),
            'perbaikan_id' => $transaksi->id
        ]);

        return redirect()->route('dashboard.transaksi.edit', $transaksi->id);
    }
}
