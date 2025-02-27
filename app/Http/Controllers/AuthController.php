<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash};
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function loginGet() {
        return view('/auth/login', ['title' => 'Đăng Nhập']);
    }

    public function loginPost(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            myFlasherBuilder(message: 'Đăng nhập thành công', success: true);
            return redirect('/home');
        }

        myFlasherBuilder(message: 'Sai thông tin đăng nhập', failed: true);
        return back();
    }

    public function registrationGet() {
        return view('/auth/register', ['title' => 'Đăng Ký']);
    }

    public function registrationPost(Request $request) {
        $data = $request->validate([
            'fullname' => 'required|max:255',
            'username' => 'required|max:15',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|confirmed|min:4',
            'phone' => 'required|numeric',
            'gender' => 'required',
            'address' => 'required',
        ]);

        $data['password'] = Hash::make($data['password']);
        $data += ['image' => env('IMAGE_PROFILE'), 'coupon' => 0, 'point' => 0, 'remember_token' => Str::random(30), 'role_id' => 2];

        try {
            User::create($data);
            myFlasherBuilder(message: 'Tạo tài khoản thành công', success: true);
            return redirect('/auth/login');
        } catch (\Exception $e) {
            return abort(500);
        }
    }

    public function logoutPost() {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        myFlasherBuilder(message: 'Đăng xuất thành công', success: true);
        return redirect('/auth');
    }
}
