<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
            'product_id' => 1,
            'user_id' => 4,
            'quantity' => 1,
            'address' => 'Số 99, đường Phạm Văn Đồng, Hải Phòng',
            'shipping_address' => 'Số 99, đường Phạm Văn Đồng, Hải Phòng',
            'total_price' => 45000,
            'payment_id' => 2,
            'bank_id' => 2,
            'note_id' => 4,
            'status_id' => 4,
            'transaction_doc' => null,
            'is_done' => 0,
        ]);

        Order::create([
            'product_id' => 2,
            'user_id' => 2,
            'quantity' => 2,
            'address' => 'Số 45, đường Lê Lợi, TP Hồ Chí Minh',
            'shipping_address' => 'Số 45, đường Lê Lợi, TP Hồ Chí Minh',
            'total_price' => 80000,
            'payment_id' => 1,
            'bank_id' => 2,
            'note_id' => 4,
            'status_id' => 4,
            'transaction_doc' => null,
            'is_done' => 1,
        ]);

        Order::create([
            'product_id' => 3,
            'user_id' => 3,
            'quantity' => 3,
            'address' => 'Số 8, đường Lý Thường Kiệt, Đà Nẵng',
            'shipping_address' => 'Số 8, đường Lý Thường Kiệt, Đà Nẵng',
            'total_price' => 150000,
            'payment_id' => 1,
            'bank_id' => null,
            'note_id' => 3,
            'status_id' => 3,
            'transaction_doc' => null,
            'is_done' => 0,
        ]);

        Order::create([
            'product_id' => 1,
            'user_id' => 5,
            'quantity' => 2,
            'address' => 'Số 21, đường Nguyễn Du, Bình Dương',
            'shipping_address' => 'Số 21, đường Nguyễn Du, Bình Dương',
            'total_price' => 90000,
            'payment_id' => 2,
            'bank_id' => 2,
            'note_id' => 5,
            'status_id' => 5,
            'transaction_doc' => null,
            'is_done' => 1,
        ]);

        Order::create([
            'product_id' => 2,
            'user_id' => 1,
            'quantity' => 1,
            'address' => 'Ngõ 197 Văn Quán Hà Đông',
            'shipping_address' => 'Ngõ 197 Văn Quán Hà Đông',
            'total_price' => 40000,
            'payment_id' => 1,
            'bank_id' => null,
            'note_id' => 1,
            'status_id' => 2,
            'transaction_doc' => null,
            'is_done' => 0,
        ]);
    }
}
