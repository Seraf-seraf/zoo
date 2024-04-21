<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function auth(Request $request)
    {
        User::firstOrCreate(['ip_address' => $request->getClientIp()]);

        return redirect(route('animals'));
    }

    public function logout(Request $request, User $user)
    {
        $user::where('ip_address', $request->getClientIp())->first()->delete();
        Auth::logout();

        return redirect(route('home'));
    }
}
