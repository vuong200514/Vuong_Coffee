<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|integer',
            'user_id' => 'required|integer',
            'quantity' => 'required|integer',
            'address' => 'required|string',
            'shipping_address' => 'required|string',
            'total_price' => 'required|integer',
            'payment_id' => 'required|integer',
            'bank_id' => 'nullable|integer',
            'note_id' => 'required|integer',
            'status_id' => 'required|integer',
            'transaction_doc' => 'nullable|string',
            'is_done' => 'required|integer',
            'refusal_reason' => 'nullable|string',
            'coupon_used' => 'required|integer',
        ]);

        $order = Order::create($validatedData);

        return response()->json([
            'success' => true,
            'data' => $order
        ], 201);
    }
}
