<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Kapal;
use App\Perbaikan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();

        $jumlahUser = User::where('perusahaan_id', $user->perusahaan_accessor->id)
            ->count('id');

//        $jumlahTransaksi = Perbaikan::where('perusahaan_id', $user->perusahaan_accessor->id)
//            ->count('id');

        return view('dashboard.index');
    }
}
