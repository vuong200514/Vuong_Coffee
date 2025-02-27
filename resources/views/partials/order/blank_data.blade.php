<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="text-center mt-4">
                <h1 class="display-1">😞</h1>
                <p class="lead">Không có dữ liệu</p>
                @if (!isset($is_filtered))
                <p>Hiện tại không có đơn hàng nào!</p>
                @else
                <p>Không có đơn hàng với trạng thái {{ $is_filtered }}</p>
                @endif

                @if (auth()->user()->role_id == 2)
                <a href="/product" class="btn btn-primary mt-3">
                    <i class="fas fa-shopping-cart me-1"></i>
                    Mua một số sản phẩm tốt ngay bây giờ
                </a>
                @else
                <a href="/order/order_history" class="btn btn-secondary mt-3">
                    <i class="fas fa-history me-1"></i>
                    Kiểm tra lịch sử đơn hàng
                </a>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
    .container {
        background-color: #f8f9fa;
        padding: 50px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .display-1 {
        font-size: 5rem;
        color: #dc3545;
    }

    .lead {
        font-size: 1.5rem;
        color: #6c757d;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('.btn');
    });
</script>
