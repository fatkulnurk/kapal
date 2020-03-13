<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\JenisKapal;
use App\KategoriPekerjaan;
use App\KategoriPekerjaanMaster;
use Illuminate\Http\Request;

class KategoriPekerjaanController extends Controller
{
    public function __invoke()
    {
        return KategoriPekerjaanMaster::select(['nama'])->get();
    }
}
