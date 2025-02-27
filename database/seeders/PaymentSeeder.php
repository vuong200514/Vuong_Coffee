<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment::create([
            "payment_method" => "Chuyển khoản ngân hàng"
        ]);

        Payment::create([
            "payment_method" => "Thanh toán khi nhận hàng (COD)"
        ]);
    }
}
