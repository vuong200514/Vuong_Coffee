<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     *
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "fullname" => "Đào Mạnh Vương",
            "username" => "vuong2005",
            "email" => "aoaao25@gmail.com",
            "password" => Hash::make("1"),
            "image" => env("IMAGE_PROFILE"),
            "phone" => "0974807212",
            "gender" => "Nam",
            "address" => "Ngõ 197 Văn Quán Hà Đông",
            "role_id" => 1,
            'remember_token' => Str::random(30),
        ]);

        User::create([
            "fullname" => "Khánh Đóm Chúa",
            "username" => "khanhle",
            "email" => "khanhle@gmail.com",
            "password" => Hash::make("1234"),
            "image" => env("IMAGE_KHANH_PROFILE"),
            "phone" => "0912345678",
            "gender" => "Nam",
            "address" => "Số 45, đường Lê Lợi, TP Hà Nội",
            "role_id" => 2,
            'remember_token' => Str::random(30),
        ]);

        User::create([
            "fullname" => "Lê Minh C",
            "username" => "leminhc",
            "email" => "leminhc@gmail.com",
            "password" => Hash::make("1234"),
            "image" => env("IMAGE_PROFILE"),
            "phone" => "0923456789",
            "gender" => "Nam",
            "address" => "Số 8, đường Lý Thường Kiệt, Đà Nẵng",
            "role_id" => 2,
            'remember_token' => Str::random(30),
        ]);

        User::create([
            "fullname" => "Phạm Minh D",
            "username" => "phamminhd",
            "email" => "phamminhd@gmail.com",
            "password" => Hash::make("1234"),
            "image" => env("IMAGE_PROFILE"),
            "phone" => "0934567890",
            "gender" => "Nam",
            "address" => "Số 99, đường Phạm Văn Đồng, Hải Phòng",
            "role_id" => 2,
            'remember_token' => Str::random(30),
        ]);

        User::create([
            "fullname" => "Võ Thị E",
            "username" => "vothie",
            "email" => "vothie@gmail.com",
            "password" => Hash::make("1234"),
            "image" => env("IMAGE_PROFILE"),
            "phone" => "0945678901",
            "gender" => "Nữ",
            "address" => "Số 21, đường Nguyễn Du, Bình Dương",
            "role_id" => 2,
            'remember_token' => Str::random(30),
        ]);
    }
}
