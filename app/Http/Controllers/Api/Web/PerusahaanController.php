<?php

namespace App\Http\Controllers\Api\Web;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Kapal;
use App\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerusahaanController extends Controller
{
    public function __invoke()
    {
        if (Auth::user()->hasRole(RoleEnum::$owner)) {
            return Auth::user()->perusahaan_accessor;
        }

        return Perusahaan::all();
    }
}
