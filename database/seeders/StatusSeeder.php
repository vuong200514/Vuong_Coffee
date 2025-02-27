<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            "order_status" => "đã duyệt",
            "style" => "thành công",
        ]);

        Status::create([
            "order_status" => "đang chờ",
            "style" => "cảnh báo",
        ]);

        Status::create([
            "order_status" => "bị từ chối",
            "style" => "nguy hiểm",
        ]);

        Status::create([
            "order_status" => "hoàn thành",
            "style" => "thông tin",
        ]);

        Status::create([
            "order_status" => "đã hủy",
            "style" => "phụ",
        ]);
    }
}
