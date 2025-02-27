<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Storage, Validator};
use App\Models\{Order, Status, Product, Role, Transaction, User};
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function makeOrderGet($productId)
    {
        $product = Product::findOrFail($productId);
        return view('order.make_order', [
            'title' => 'Make Order',
            'product' => $product
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
            'quantity' => 'required|integer|min:1',
            'address' => 'required|string|max:255',
            'total_price' => 'required|numeric|min:0',
        ]);

        try {
            Order::create([
                'product_id' => $validatedData['product_id'],
                'user_id' => $validatedData['user_id'],
                'quantity' => $validatedData['quantity'],
                'address' => $validatedData['address'],
                'shipping_address' => 'NULL',
                'total_price' => $validatedData['total_price'],
                'payment_id' => 2,
                'bank_id' => 1,
                'note_id' => 1,
                'status_id' => 2,
                'transaction_doc' => null,
                'is_done' => 0,
            ]);
    
            session()->flash('success', 'Đơn hàng đã được tạo thành công!');
            return back();
        } catch (\Exception $e) {
            session()->flash('error', 'Tạo đơn hàng thất bại, vui lòng thử lại!');
            return back();
        }
    }


    public function orderData()
    {
        $title = "Dữ Liệu Đơn Hàng";
        if (auth()->user()->role_id == Role::ADMIN_ID) {
            $orders = Order::with("bank", "note", "payment", "user", "status", "product")->where(["is_done" => 0])->orderBy("id", "ASC")->get();
        } else {
            $orders = Order::with("bank", "note", "payment", "user", "status", "product")->where(["user_id" => auth()->user()->id, "is_done" => 0])->orderBy("id", "ASC")->get();
        }
        $status = Status::all();

        return view("/order/order_data", compact("title", "orders", "status"));
    }

    public function orderDataFilter(Request $request, $status_id)
    {
        $title = "Dữ Liệu Đơn Hàng";
        $orders = Order::with("bank", "note", "payment", "user", "status", "product")->where("status_id", $status_id)->orderBy("id", "ASC")->get();
        $status = Status::all();

        return view("/order/order_data", compact("title", "orders", "status"));
    }

    public function getOrderData(Order $order)
    {
        $order->load("product", "user", "note", "status", "bank", "payment");
        return $order;
    }

    public function orderHistory()
    {
        $title = "Dữ Liệu Lịch Sử";
        if (auth()->user()->role_id == Role::ADMIN_ID) {
            $orders = Order::with("bank", "note", "payment", "user", "status", "product")->where(["is_done" => 1])->orderBy("id", "ASC")->get();
        } else {
            $orders = Order::with("bank", "note", "payment", "user", "status", "product")->where(["user_id" => auth()->user()->id, "is_done" => 1])->orderBy("id", "ASC")->get();
        }
        $status = Status::all();

        return view("/order/order_data", compact("title", "orders", "status"));
    }

}
