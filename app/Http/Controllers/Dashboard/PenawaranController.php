<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Penawaran;
use App\Perbaikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenawaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $penawaran = Penawaran::with(['perbaikan.kapal', 'perbaikan.kategoriPekerjaan.uraianPekerjaan'])
            ->has('perbaikan')
            ->where('perusahaan_id', Auth::user()->perusahaan_accessor->id)
            ->get();

        return view('dashboard.penawaran.index', compact('penawaran'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $penawaran = Penawaran::with(['perbaikan.kapal', 'perbaikan.kategoriPekerjaan.uraianPekerjaan'])
            ->find($id);

        return view('dashboard.penawaran.show', compact('penawaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $penawaran = Penawaran::with(['perbaikan.kapal', 'perbaikan.kategoriPekerjaan.uraianPekerjaan'])
            ->find($id);
        $status = Penawaran::getDataStatus();

        return view('dashboard.penawaran.edit', compact('penawaran', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'verified' => 'required'
        ]);

        $penawaran = Penawaran::with('perbaikan')->find($id);
        $penawaran->update($request->only(['verified']));

        if ($request->input('verified') == 'disetujui') {
            $perbaikan = $penawaran->perbaikan;

            $perbaikan->update([
                'harga_setelah_penawaran' => $penawaran->total_setelah_penawaran
            ]);
        }

        return redirect()
            ->route('dashboard.penawaran.index')
            ->with('success', 'Status berhasil dirubah');
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
