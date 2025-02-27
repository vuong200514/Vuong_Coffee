<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Hash, Storage};

class ProfileController extends Controller
{
    public function myProfile() {
        return view('/profile/my_profile', ['title' => 'Hồ sơ của tôi']);
    }

    public function editProfileGet() {
        return view('/profile/edit_profile', ['title' => 'Chỉnh sửa hồ sơ']);
    }

    public function editProfilePost(Request $request, User $user) {
        $rules = [
            'fullname' => 'required|max:255',
            'phone' => 'required|numeric',
            'address' => 'required',
            'username' => 'required|max:15' . (auth()->user()->username != $request->username ? '|unique:users,username' : ''),
            'image' => $request->file('image') ? 'image|file|max:2048' : ''
        ];

        $validatedData = $request->validate($rules);

        try {
            if ($request->file('image')) {
                if ($request->oldImage && $request->oldImage != env('IMAGE_PROFILE')) {
                    Storage::delete($request->oldImage);
                }
                $fileName = pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $uniqueFileName = $fileName . '_' . time() . '.' . $extension;
                $path = 'profile/' . $uniqueFileName;
                $request->file('image')->storeAs('profile', $uniqueFileName);
                $validatedData['image'] = $path;
            }

            if ($user->update($validatedData)) {
                myFlasherBuilder(message: 'Hồ sơ của bạn đã được cập nhật!', success: true);
            } else {
                myFlasherBuilder(message: 'Hành động <strong>thất bại</strong>, không có thay đổi nào được phát hiện!', failed: true);
            }
            return redirect('/profile/edit_profile');
        } catch (Exception $exception) {
            return abort(500);
        }
    }

    public function changePasswordGet() {
        return view('/profile/change_password', ['title' => 'Đổi mật khẩu']);
    }

    public function changePasswordPost(Request $request) {
        $validated = $request->validate([
            'current_password' => 'required|min:4',
            'password' => 'required|confirmed|min:4'
        ]);

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            myFlasherBuilder(message: 'Mật khẩu hiện tại không đúng!', failed: true);
            return back();
        }

        if ($request->current_password === $request->password) {
            myFlasherBuilder(message: 'Mật khẩu mới không được trùng với mật khẩu hiện tại!', failed: true);
            return back();
        }

        auth()->user()->update(['password' => Hash::make($validated['password'])]);
        myFlasherBuilder(message: 'Mật khẩu đã được cập nhật', success: true);
        return redirect('/home');
    }
}
