<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\JenisKapal;
use App\Kapal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KapalController extends Controller
{
    public function index()
    {
        $kapal = Kapal::where('perusahaan_id', Auth::user()->perusahaan_accessor->id)->get();
        return view('dashboard.kapal.index', compact('kapal'));
    }

    public function create()
    {
        $jenisKapal = JenisKapal::select('nama')->get();
        return view('dashboard.kapal.create', compact('jenisKapal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kapal' => 'required|string',
            'jenis_kapal' => 'required|string',
            'ukuran_panjang' => 'required|string',
            'ukuran_panjang_satuan' => 'required|string',
            'ukuran_lebar' => 'required|string',
            'ukuran_lebar_satuan' => 'nullable|string',
            'ukuran_tinggi' => 'required|string',
            'ukuran_tinggi_satuan' => 'nullable|string',
            'ukuran_sarat' => 'required|string',
            'ukuran_sarat_satuan' => 'nullable|string',
            'ukuran_gt' => 'required|string',
            'ukuran_gt_satuan' => 'required|string',
        ]);

        $data = new Kapal($request->only([
            'nama_kapal', 'jenis_kapal',
            'ukuran_panjang', 'ukuran_panjang_satuan',
            'ukuran_lebar', 'ukuran_lebar_satuan',
            'ukuran_tinggi', 'ukuran_tinggi_satuan',
            'ukuran_sarat', 'ukuran_sarat_satuan',
            'ukuran_gt', 'ukuran_gt_satuan',
        ]));
        $data->perusahaan_id = Auth::user()->perusahaan_accessor->id;
        $data->save();

        return redirect()
            ->route('dashboard.kapal.index')
            ->with('success', __('redirect-notification.dashboard.jenis-kapal.store.success'));
    }
}
