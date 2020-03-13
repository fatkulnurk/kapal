<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\JenisKapal;
use App\Kapal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KapalController extends Controller
{
    public function __invoke()
    {
        return Kapal::where('perusahaan_id', Auth::user()->perusahaan_accessor->id)->get();
    }
}
