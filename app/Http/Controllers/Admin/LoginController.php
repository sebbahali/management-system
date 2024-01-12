<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    public function show_login_view()
    {
        return view('admin.auth.login');

    }

    public function login(LoginRequest $request)
    {
        if (auth()->guard('admin')->attempt($request->only('username','password'))) {

            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.showlogin')->with(['error' => 'عفوا بيانات التسجيل غير صحيحة !!']);
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.showlogin');
    }
}
