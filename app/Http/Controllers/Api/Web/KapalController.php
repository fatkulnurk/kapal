<?php

namespace App\Http\Controllers\Api\Web;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\JenisKapal;
use App\Kapal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KapalController extends Controller
{
    public function __invoke(Request $request)
    {
        if (Auth::user()->hasRole(RoleEnum::$owner)) {
            return Kapal::where('perusahaan_id', Auth::user()->perusahaan_accessor->id)->get();
        }

        if ($request->has('perusahaan_id')) {
            return Kapal::where('perusahaan_id', $request->query('perusahaan_id'))->get();
        }

        return [];

//        return Kapal::all();
    }
}
