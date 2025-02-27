<?php

namespace Database\Seeders;

use App\Models\Note;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Note::create([
            "order_notes" => "Chờ xác nhận thanh toán khi nhận hàng (COD)"
        ]);

        Note::create([
            "order_notes" => "[Chưa có bằng chứng chuyển khoản] Đang chờ người dùng gửi bằng chứng giao dịch"
        ]);

        Note::create([
            "order_notes" => "Bằng chứng chuyển khoản đã gửi, chờ duyệt từ quản trị viên"
        ]);

        Note::create([
            "order_notes" => "Bằng chứng chuyển khoản được duyệt, chờ giao hàng"
        ]);

        Note::create([
            "order_notes" => "Giao dịch thành công"
        ]);

        Note::create([
            "order_notes" => "Đơn hàng bị hủy bởi người dùng"
        ]);
    }
}
