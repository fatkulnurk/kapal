<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KapalController extends Controller
{
    public function index()
    {
        return view('dashboard.kapal.index');
    }

    public function create()
    {
        return view('dashboard.kapal.create');
    }
}
