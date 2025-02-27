<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::create([
            'category_id' => 1,
            'description' => 'Bán hàng tháng 1',
            'income' => 1000000,
            'outcome' => null,
        ]);

        Transaction::create([
            'category_id' => 2,
            'description' => 'Mua nguyên liệu sản xuất',
            'income' => null,
            'outcome' => 500000,
        ]);

        Transaction::create([
            'category_id' => 3,
            'description' => 'Chi phí quảng cáo Facebook',
            'income' => null,
            'outcome' => 200000,
        ]);

        Transaction::create([
            'category_id' => 4,
            'description' => 'Chi phí bảo trì máy chủ tháng 1',
            'income' => null,
            'outcome' => 100000,
        ]);

        Transaction::create([
            'category_id' => 1,
            'description' => 'Bán hàng tháng 2',
            'income' => 1500000,
            'outcome' => null,
        ]);
    }
}
