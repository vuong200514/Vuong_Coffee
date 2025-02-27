<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            "category_name" => "Doanh thu bán hàng",
        ]);

        Category::create([
            "category_name" => "Chi phí sản xuất",
        ]);

        Category::create([
            "category_name" => "Chi phí marketing",
        ]);

        Category::create([
            "category_name" => "Bảo trì máy chủ",
        ]);
    }
}
