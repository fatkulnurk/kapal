<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\JenisKapal;
use App\Kapal;
use App\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KapalController extends Controller
{
    public function __construct()
    {
//        $this->middleware('role:' . RoleEnum::$owner.'|'.RoleEnum::$managerProduksi.'|'.RoleEnum::$biayaKalkulasi)
//            ->only(['index', 'show']);
//
//        $this->middleware('role:' . RoleEnum::$managerProduksi.'|'.RoleEnum::$biayaKalkulasi)
//            ->except(['index', 'show']);
    }

    public function index()
    {
        if (Auth::user()->hasRole(RoleEnum::$biayaKalkulasi)) {
            $kapal = Kapal::all();
        } else {
            $kapal = Kapal::where('perusahaan_id', Auth::user()->perusahaan_accessor->id)->get();
        }

        return view('dashboard.kapal.index', compact('kapal'));
    }

    public function create()
    {
        $jenisKapal = JenisKapal::select('nama')->get();
        $satuan = Satuan::select('nama')->get();
        return view('dashboard.kapal.create', compact('jenisKapal', 'satuan'));
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

    public function show($id, Request $request)
    {
        $kapal = Kapal::findOrFail($id);
        $jenisKapal = JenisKapal::select('nama')->get();
        $satuan = Satuan::select('nama')->get();

        return view('dashboard.kapal.show', compact('kapal', 'jenisKapal', 'satuan'));
    }

    public function edit($id, Request $request)
    {
        $kapal = Kapal::findOrFail($id);
        $jenisKapal = JenisKapal::select('nama')->get();
        $satuan = Satuan::select('nama')->get();

        return view('dashboard.kapal.edit', compact('kapal', 'jenisKapal', 'satuan'));
    }

    public function update($id, Request $request)
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

        $kapal = Kapal::findOrFail($id);
        $kapal->update($request->only([
            'nama_kapal', 'jenis_kapal',
            'ukuran_panjang', 'ukuran_panjang_satuan',
            'ukuran_lebar', 'ukuran_lebar_satuan',
            'ukuran_tinggi', 'ukuran_tinggi_satuan',
            'ukuran_sarat', 'ukuran_sarat_satuan',
            'ukuran_gt', 'ukuran_gt_satuan',
        ]));

        return redirect()
            ->route('dashboard.kapal.index')
            ->with('success', __('redirect-notification.dashboard.jenis-kapal.update.success'));
    }

    public function destroy($id, Request $request)
    {
        $kapal = Kapal::findOrFail($id);
        $kapal->delete();
        return redirect()
            ->route('dashboard.kapal.index')
            ->with('success', __('redirect-notification.dashboard.jenis-kapal.delete.success'));
    }

}
