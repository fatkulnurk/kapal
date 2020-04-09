<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __invoke()
    {
        return User::with('roles')->findOrFail(\auth()->id());
    }
}
