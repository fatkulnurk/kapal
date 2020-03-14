<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\JenisKapal;
use App\Satuan;
use Illuminate\Http\Request;

class JenisKapalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenisKapal = JenisKapal::get();
        return response()
            ->view('dashboard.jenis-kapal.index', compact('jenisKapal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()
            ->view('dashboard.jenis-kapal.create');
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

        $data = JenisKapal::create($request->only('nama'));

        return redirect()->route('dashboard.jenis-kapal.index')
            ->with('success', __('redirect-notification.dashboard.jenis-kapal.store.success'))
            ->with('data', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $jenisKapal = JenisKapal::findOrFail($id);
        return view('dashboard.jenis-kapal.edit', compact('jenisKapal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $jenisKapal = JenisKapal::findOrFail($id);
        return view('dashboard.jenis-kapal.edit', compact('jenisKapal'));
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
            'nama' => 'required|string|max:191'
        ]);

        $data = JenisKapal::findOrFail($id);
        $data->update($request->only('nama'));

        return redirect()->route('dashboard.jenis-kapal.index')
            ->with('success', __('redirect-notification.dashboard.jenis-kapal.update.success'))
            ->with('data', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $data = JenisKapal::findOrFail($id);
        $data->delete();

        return redirect()->route('dashboard.jenis-kapal.index')
            ->with('success', __('redirect-notification.dashboard.jenis-kapal.delete.success'));
    }
}
