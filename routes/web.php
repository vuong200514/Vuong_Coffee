<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController, HomeController, OrderController, PointController, ReviewController, ProductController, ProfileController, RajaOngkirController, TransactionController};

// đã xác thực
Route::middleware(['alreadyLogin'])->group(function () {
    // trang landing
    Route::get('/', function () {
        return view('landing.index', [
            "title" => "Preview",
        ]);
    });

    // Đăng nhập
    Route::get('/{url}', [AuthController::class, "loginGet"])->where(["url" => "auth|auth/login"])->name("auth");
    Route::post('/auth/login', [AuthController::class, "loginPost"]);

    // Đăng ký
    Route::get('/auth/register', [AuthController::class, "registrationGet"]);
    Route::post('/auth/register', [AuthController::class, "registrationPost"]);
});


// chính
Route::middleware(['auth'])->group(function () {
    // Đăng xuất
    Route::post('/auth/logout', [AuthController::class, "logoutPost"]);

    // Trang chủ
    Route::controller(HomeController::class)->group(function () {
        Route::get("/home", "index");
        Route::get("/home/customers", "customers");
    });

    // Hồ sơ
    Route::controller(ProfileController::class)->group(function () {
        Route::get("/profile/my_profile", "myProfile");
        Route::get("/profile/edit_profile", "editProfileGet");
        Route::post("/profile/edit_profile/{user:id}", "editProfilePost");
        Route::get("/profile/change_password", "changePasswordGet");
        Route::post("/profile/change_password", "changePasswordPost");
    });

    // Sản phẩm
    Route::controller(ProductController::class)->group(function () {
        Route::get("/product", "index");
        Route::get("/product/data/{id}", "getProductData");

        // chỉ admin
        Route::get("/product/add_product", "addProductGet")->can("add_product", App\Models\Product::class);
        Route::post("/product/add_product", "addProductPost")->can("add_product", App\Models\Product::class);
        Route::get("/product/edit_product/{product:id}", "editProductGet")->can("edit_product", App\Models\Product::class);
        Route::post("/product/edit_product/{product:id}", "editProductPost")->can("edit_product", App\Models\Product::class);
        Route::delete("/product/delete_product/{product:id}", "deleteProduct")->can("delete_product", App\Models\Product::class);
    });

    // Đơn hàng
    Route::controller(OrderController::class)->group(function () {
        Route::get("/order/order_data", "orderData");
        Route::get("/order/order_history", "orderHistory");
        Route::post('/order/make_order', 'store')->name('orders.store');

        // chỉ khách hàng
        Route::get("/order/make_order/{product:id}", "makeOrderGet")->can("create_order", App\Models\Order::class);
        Route::post("/order/make_order/{product:id}", "makeOrderPost")->can("create_order", App\Models\Order::class);
    });

    // Đánh giá
    Route::controller(ReviewController::class)->group(function () {
        Route::get("/review/product/{product}", "productReview");
        Route::get("/review/data/{review}", "getDataReview");
        Route::post("/review/add_review/", "addReview");
        Route::post("/review/edit_review/{review}", "editReview")->can("edit_review", "review");
        Route::post("/review/delete_review/{review}", "deleteReview")->can("delete_review", "review");
    });

    // Giao dịch
    Route::controller(TransactionController::class)->group(function () {
        Route::get("/transaction", "index")->can("is_admin");
        Route::get("/transaction/add_outcome", "addOutcomeGet")->can("is_admin");
        Route::post("/transaction/add_outcome", "addOutcomePost")->can("is_admin");
        Route::get("/transaction/edit_outcome/{transaction}", "editOutcomeGet")->can("is_admin");
        Route::post("/transaction/edit_outcome/{transaction}", "editOutcomePost")->can("is_admin");
    });
});
