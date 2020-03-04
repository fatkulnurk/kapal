<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('dashboard.transaksi.index');
    }

    public function create()
    {
        return view('dashboard.transaksi.create');
    }

    public function store(Request $request)
    {
        return $request;
    }
}
