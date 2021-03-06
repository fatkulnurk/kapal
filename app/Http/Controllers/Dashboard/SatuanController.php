<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $satuan = Satuan::get();
        return view('dashboard.satuan.index', compact('satuan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()
            ->view('dashboard.satuan.create');
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

        $data = Satuan::create($request->only('nama'));

        return redirect()->route('dashboard.satuan.index')
            ->with('success', __('redirect-notification.dashboard.satuan.store.success'))
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
        $satuan = Satuan::findOrFail($id);

        return view('dashboard.satuan.edit', compact('satuan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $satuan = Satuan::findOrFail($id);

        return view('dashboard.satuan.edit', compact('satuan'));
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

        $satuan = Satuan::findOrFail($id);

        $satuan->update($request->only('nama'));

        return redirect()->route('dashboard.satuan.index')
            ->with('success', __('redirect-notification.dashboard.satuan.update.success'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $data = Satuan::findOrFail($id);
        $data->delete();

        return redirect()->route('dashboard.satuan.index')
            ->with('success', __('redirect-notification.dashboard.satuan.delete.success'));
    }
}
