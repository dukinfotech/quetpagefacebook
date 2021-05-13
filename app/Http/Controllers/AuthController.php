<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function showLogin()
    {
        return view('auth/login');
    }

    public function login(LoginFormRequest $loginFormRequest)
    {
        $credentials = $loginFormRequest->validated();
        $remember = null;
        if (array_key_exists('remember_me', $credentials)) {
            $remember = $credentials['remember_me'];
            unset($credentials['remember_me']);
        }
        $remember = $remember == 'on';

        if ($credentials['email'] != 'admin@email.com') {
            return back()->withErrors([
                'email' => 'Bạn không có quyền truy cập vào trang này'
            ]);
        }
        
        if (Auth::attempt($credentials, $remember)) {
            $loginFormRequest->session()->regenerate();
            return redirect('/admin');
        }

        return back()
            ->withErrors([
                'email' => 'Sai tên tài khoản hoặc mật khẩu.',
            ])->withInput(
                $loginFormRequest->except('password')
            );;
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
