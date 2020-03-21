<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Kapal;
use App\Perbaikan;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:' . RoleEnum::$owner.'|'.RoleEnum::$managerProduksi)
            ->only(['index', 'show']);
        $this->middleware('role:' . RoleEnum::$managerProduksi)
            ->except(['index', 'show']);
    }

    public function index()
    {
        $user = Auth::user();
        $transaksi = Perbaikan::with(['kapal.perusahaan', 'kategoriPekerjaan.uraianPekerjaan'])
            ->whereHas('kapal', function (Builder $query) use ($user){
                $query->where('perusahaan_id', $user->perusahaan_accessor->id);
            })
            ->get();

        return view('dashboard.transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        return view('dashboard.transaksi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kapal_id' => 'required',
        ]);

        $data = Arr::add($request->only(['kapal_id']), 'nomor_transaksi', random_perbaikan());

        $perbaikan = Perbaikan::create($data);

        return redirect()
            ->route('dashboard.transaksi.edit', $perbaikan->id);
    }

    public function show($id, Request $request)
    {
        $transaksi = Perbaikan::with(['kapal.perusahaan', 'kategoriPekerjaan.uraianPekerjaan', 'penawaran'])->findOrFail($id);

//        return $transaksi;

        return view('dashboard.transaksi.show', compact('transaksi'));
    }

    public function edit($id, Request $request)
    {
        $transaksi = Perbaikan::with(['kapal.perusahaan', 'kategoriPekerjaan.uraianPekerjaan'])->findOrFail($id);

//        return $transaksi;

        return view('dashboard.transaksi.edit', compact('transaksi'));
    }

    public function destroy($id)
    {
        $data = Perbaikan::findOrFail($id);
        $data->delete();
        return redirect()
            ->route('dashboard.transaksi.index')
            ->with('success', __('redirect-notification.dashboard.transaksi.delete.success'));
    }
}
