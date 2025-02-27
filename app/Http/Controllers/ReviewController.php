<?php

namespace App\Http\Controllers;

use App\Models\{User, Product, Review, Order};
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function productReview(Product $product)
    {
        $user = auth()->user();
        $reviews = $product->review;
        $rate = $reviews->count() ? $reviews->avg("rating") : 0;
        
        $starCounter = collect(range(1, 5))->map(fn($i) => Review::where(["rating" => $i, "product_id" => $product->id])->count());
        
        return view("/review/product_review", [
            "title" => "Đánh giá sản phẩm",
            "reviews" => $reviews,
            "product" => $product,
            "rate" => $rate,
            "isPurchased" => $this->isPurchased($user, $product),
            "isReviewed" => $this->isReviewed($user, $product),
            "starCounter" => $starCounter,
            "sum" => $starCounter->sum()
        ]);
    }

    public function addReview(Request $request)
    {
        Review::create(array_merge($request->validate(["rating" => "required", "review" => "required"]), [
            "user_id" => auth()->id(),
            "product_id" => $request->product_id,
            "is_edit" => 0
        ]));
        
        myFlasherBuilder("Đánh giá của bạn đã được tạo!", true);
        return back();
    }

    public function getDataReview(Review $review)
    {
        return $review;
    }

    public function editReview(Request $request, Review $review)
    {
        $review->update(["rating" => $request->rating, "review" => $request->review_edit, "is_edit" => 1]);
        myFlasherBuilder("Đánh giá của bạn đã được cập nhật!", true);
        return back();
    }

    public function deleteReview(Review $review)
    {
        $review->delete();
        myFlasherBuilder("Đánh giá của bạn đã được xóa!", true);
        return back();
    }

    private function isPurchased($user, $product)
    {
        return Order::where(["user_id" => $user->id, "product_id" => $product->id, "is_done" => 1])->exists();
    }

    private function isReviewed($user, $product)
    {
        return Review::where(["user_id" => $user->id, "product_id" => $product->id])->exists();
    }
}
