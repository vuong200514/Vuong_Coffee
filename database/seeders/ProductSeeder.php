<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Chạy các lệnh seed của cơ sở dữ liệu.
     *
     * @return void
     */
    public function run()
    {

        Product::create([
            "product_name" => "Trà Thái",
            "orientation" => "Trà Thái nổi tiếng với hương vị thơm ngon, kết hợp giữa trà xanh và các loại thảo mộc tự nhiên.",
            "description" => "Trà Thái được pha chế từ trà xanh cao cấp, kết hợp với sữa đặc và các loại thảo mộc tạo nên hương vị đậm đà, thơm ngọt đặc trưng. Đây là món thức uống được yêu thích bởi sự tươi mát và vị ngọt thanh dễ chịu.",
            "price" => 45000,
            "stock" => 150,
            "discount" => 10,
            "image" => "product/tra_sua_thai_lan.jpg",
        ]);

        Product::create([
            "product_name" => "Trà sữa Ô Long",
            "orientation" => "Trà sữa Ô Long mang đậm hương vị trà đen cổ điển, kết hợp với sữa tươi tạo nên một thức uống vừa thanh mát vừa ngọt ngào.",
            "description" => "Trà sữa Ô Long là sự kết hợp hoàn hảo giữa trà Ô Long hảo hạng và sữa tươi, tạo nên một thức uống thơm ngon, dễ uống, được nhiều người yêu thích. Trà Ô Long không quá đắng mà có vị ngọt nhẹ, rất thích hợp cho những ai thích sự nhẹ nhàng.",
            "price" => 40000,
            "stock" => 100,
            "discount" => 5,
            "image" => "product/tra_sua_o_long.jpg",
        ]);

        Product::create([
            "product_name" => "Trà sữa Matcha",
            "orientation" => "Trà sữa Matcha kết hợp giữa trà xanh Nhật Bản và sữa tươi, mang lại hương vị tươi mát và bổ dưỡng.",
            "description" => "Trà sữa Matcha là sự kết hợp tuyệt vời giữa bột trà xanh Matcha nguyên chất và sữa tươi. Với màu xanh đặc trưng và hương vị thanh mát, đây là sự lựa chọn lý tưởng cho những ai yêu thích trà xanh. Trà sữa Matcha cũng mang lại nhiều lợi ích cho sức khỏe nhờ vào lượng chất chống oxy hóa dồi dào.",
            "price" => 50000,
            "stock" => 120,
            "discount" => 0,
            "image" => "product/tra_sua_matcha.jpg",
        ]);
    }
}
