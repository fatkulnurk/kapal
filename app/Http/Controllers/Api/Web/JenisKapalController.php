<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\JenisKapal;
use Illuminate\Http\Request;

class JenisKapalController extends Controller
{
    public function __invoke()
    {
        return JenisKapal::select(['nama'])->get();
    }
}
