<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Kapal;
use App\Perbaikan;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __invoke()
    {

        if (Auth::user()->hasRole(RoleEnum::$biayaKalkulasi)) {
            $jumlahUser = User::count('id');
            $jumlahTransaksi = Perbaikan::count('id');
            $jumlahKapal = Kapal::count('id');
        } else {
            $user = Auth::user();

            // jika biaya kalkulasi dashboard kosong
            if ($user->hasRole(RoleEnum::$biayaKalkulasi)) {
                return view('dashboard.index');
            }

            $jumlahKapal = Kapal::where('perusahaan_id', $user->perusahaan_accessor->id)
                ->count('id');

            $jumlahUser = User::where('perusahaan_id', $user->perusahaan_accessor->id)
                ->count('id');

            $jumlahTransaksi = Perbaikan::with('kapal')
                ->whereHas('kapal', function (Builder $query) use ($user){
                    $query->where('perusahaan_id', $user->perusahaan_accessor->id);
                })->count('id');
        }


        return view('dashboard.index', compact('jumlahUser', 'jumlahTransaksi', 'jumlahKapal'));
    }
}
