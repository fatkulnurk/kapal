<?php

namespace App\Http\Controllers\Dashboard\Transaksi;

use App\Http\Controllers\Controller;
use App\Penawaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AjukanPenawaranController extends Controller
{
    public function store($transactionID, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jumlah_penawaran' => 'required|min:0|max:100'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->with('error', 'Penawaran gagal, angka harus 1 sampai 100');
        }

        $penawaran = Penawaran::create([
            'perbaikan_id' => $transactionID,
            'jumlah_penawaran' => $request->input('jumlah_penawaran'),
            'user' => collect(Auth::user())->toArray(),
            'perusahaan_id' => Auth::user()->perusahaan_accessor->id
        ]);

        return redirect()->route('dashboard.penawaran.index')
            ->with('success', 'Penawaran berhasil disimpan, tunggu untuk di konfirmasi');
    }
}
