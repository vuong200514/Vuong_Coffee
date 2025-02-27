<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index() {
        return view('/product/index', ['title' => 'Sản phẩm', 'product' => Product::all()]);
    }

    public function getProductData($id) {
        return Product::find($id);
    }

    public function addProductGet() {
        return view('/product/add_product', ['title' => 'Thêm sản phẩm']);
    }

    public function addProductPost(Request $request) {
        $data = $request->validate([
            'product_name' => 'required|max:25',
            'stock' => 'required|numeric|gt:0',
            'price' => 'required|numeric|gt:0',
            'discount' => 'required|numeric|gt:0|lt:100',
            'orientation' => 'required',
            'description' => 'required',
            'image' => 'image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $fileName = $request->file('image')->getClientOriginalName();
            $data['image'] = 'product/' . $fileName;
            $request->file('image')->storeAs('product', $fileName);
        } else {
            $data['image'] = env('IMAGE_PRODUCT');
        }

        try {
            Product::create($data);
            myFlasherBuilder(message: 'Sản phẩm đã được thêm thành công!', success: true);
            return redirect('/product');
        } catch (\Exception $e) {
            return abort(500);
        }
    }

    public function editProductGet(Product $product) {
        return view('/product/edit_product', ['title' => 'Chỉnh sửa sản phẩm', 'product' => $product]);
    }

    public function editProductPost(Request $request, Product $product) {
        $rules = [
            'product_name' => 'required|max:25',
            'orientation' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|gt:0',
            'stock' => 'required|numeric|gt:0',
            'discount' => 'required|numeric|gt:0|lt:100',
            'image' => 'image|file|max:2048'
        ];

        if ($product->product_name !== $request->product_name) {
            $rules['product_name'] .= '|unique:products,product_name';
        }

        $data = $request->validate($rules);

        if ($request->hasFile('image')) {
            if ($product->image && $product->image !== env('IMAGE_PRODUCT')) {
                Storage::delete($product->image);
            }
            $fileName = $request->file('image')->getClientOriginalName();
            $data['image'] = 'product/' . $fileName;
            $request->file('image')->storeAs('product', $fileName);
        }

        if ($product->update($data)) {
            myFlasherBuilder(message: 'Sản phẩm đã được cập nhật thành công!', success: true);
            return redirect('/product');
        }

        myFlasherBuilder(message: 'Thao tác <strong>thất bại</strong>, không có thay đổi nào!', failed: true);
        return back();
    }

    public function deleteProduct(Product $product) {
        try {
            if ($product->image && $product->image !== env('IMAGE_PRODUCT')) {
                Storage::delete($product->image);
            }
            $product->delete();
            myFlasherBuilder(message: 'Sản phẩm đã được xóa thành công!', success: true);
            return redirect('/product');
        } catch (\Exception $e) {
            return abort(500);
        }
    }
}
