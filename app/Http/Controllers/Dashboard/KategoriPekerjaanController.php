<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\KategoriPekerjaan;
use App\KategoriPekerjaanMaster;
use App\Satuan;
use Illuminate\Http\Request;

class KategoriPekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoriPekerjaan = KategoriPekerjaanMaster::get();
        return response()
            ->view('dashboard.kategori-pekerjaan.index', compact('kategoriPekerjaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()
            ->view('dashboard.kategori-pekerjaan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:191'
        ]);

        $data = KategoriPekerjaanMaster::create($request->only('nama'));

        return redirect()->route('dashboard.kategori-pekerjaan.index')
            ->with('success', __('redirect-notification.dashboard.kategori-pekerjaan.store.success'))
            ->with('data', compact('data'));
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
