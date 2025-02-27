<?php

namespace App\Http\Controllers;

use App\Models\{Category, Transaction};
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return view("/transaction/index", [
            "title" => "Danh sách giao dịch",
            "transactions" => Transaction::with("category")->get()
        ]);
    }

    public function addOutcomeGet()
    {
        return view("/transaction/add_outcome", [
            "title" => "Thêm giao dịch",
            "categories" => Category::where("id", "!=", 1)->get()
        ]);
    }

    public function addOutcomePost(Request $request)
    {
        Transaction::create($request->validate([
            "category_id" => "required|numeric|gt:0",
            "outcome" => "required|numeric|gt:0",
            "description" => "required"
        ], ["category_id.gt" => "Vui lòng chọn danh mục hợp lệ."]));

        myFlasherBuilder("Giao dịch đã được tạo thành công!", true);
        return redirect("/transaction");
    }

    public function editOutcomeGet(Transaction $transaction)
    {
        return view("/transaction/edit_outcome", [
            "title" => "Chỉnh sửa giao dịch",
            "transaction" => $transaction->load("category"),
            "categories" => Category::where("id", "!=", 1)->get()
        ]);
    }

    public function editOutcomePost(Request $request, Transaction $transaction)
    {
        $transaction->update($request->validate([
            "category_id" => "required|numeric|gt:0",
            "outcome" => "required|numeric|gt:0",
            "description" => "required"
        ], ["category_id.gt" => "Vui lòng chọn danh mục hợp lệ."]));

        myFlasherBuilder("Giao dịch đã được cập nhật thành công!", true);
        return redirect("/transaction");
    }
}
