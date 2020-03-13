<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\JenisKapal;
use App\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function __invoke()
    {
        return Satuan::select(['nama'])->get();
    }
}
