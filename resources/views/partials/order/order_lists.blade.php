<style>
    .order-list {
        background-color: #f8ff9d;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .order-list:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .order-list img {
        border-radius: 10px;
    }

    .order-list .order-detail-link {
        color: #8b4513;
        font-weight: bold;
    }

    .order-list .order-detail-link:hover {
        color: #d2b48c;
    }

    .order-list .link-info {
        color: #8b4513;
    }

    .panel-order .row .col-md-1 img {
        width: 100px;
        max-height: 100px;
    }

    .main-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #ec9200;
        padding: 10px;
        border-radius: 5px;
        text-align: center;
        position: relative;
        overflow: hidden;
        background: linear-gradient(90deg, #ec9200, #fff, #ec9200);
        background-size: 200% 200%;
        animation: shine 3s linear infinite;
    }

    @keyframes shine {
        0% {
            background-position: 200% 0;
        }
        100% {
            background-position: -200% 0;
        }
    }
</style>

<!-- Dữ liệu đơn hàng -->
@foreach ($orders as $row)
<div class="row mb-3 order-list">
  <div class="col-md-1">
    @if ($row->product)
    <img src="{{ '/'.'storage/'. $row->product->image }}" class="media-object img-thumbnail" />
    @else
    <img src="{{ '/'.'storage/default-image.png' }}" class="media-object img-thumbnail" />
    @endif
    <div class="order-detail">
      <span class="order-detail-link" title="chi tiết đơn hàng" style="cursor: pointer;" data-id="{{ $row->id }}" data-dipesan="{{ $row->created_at->format('d M Y') }}">
        chi tiết
      </span>
    </div>
  </div>
  <div class="col-md-11">
    <div class="row">
      <div class="col-md-12">
        <div class="float-end">
          <label class="badge bg-{{ $row->status->style }}">
            {{ $row->status->order_status }}
          </label>
        </div>
        <span>
          <strong>
            @if ($row->product)
            {{ $row->product->product_name }}
            @else
            Sản phẩm không tồn tại
            @endif
          </strong>
        </span>
        <span class="badge bg-primary">
          {{ $row->payment->payment_method }}
        </span>
        <br />
        Số lượng: {{ $row->quantity }}, Tổng giá: {{ $row->total_price }}VNĐ <br />
        <small>
          Ghi chú: {{ (isset($row->refusal_reason)) ? $row->refusal_reason : $row->note->order_notes }}
        </small>
        <br>

        @if (isset($row->product_id) && $row->is_done == 1)
        <div>
          <a href="/review/product/{{ $row->product_id }}" class="link-info" style="text-decoration: none; font-size:0.9rem;">
            Đánh giá ngay
          </a>
        </div>
        @endif
      </div>
      @php
      $dest = auth()->user()->role_id == 1 ? "/home/customers?username=" . $row->user->username : "/profile/my_profile";
      @endphp

      @if ($row->is_done == '1')
      <div class="col-md-12">đơn hàng xác nhận bởi <span class="link-danger" style="cursor: pointer;">@admin</span>
      </div>
      @else
      <div class="col-md-12">đơn hàng được tạo bởi <a href="{{ $dest }}" style="text-decoration:none;">{{ "@" . $row->user->username }}</a>
      </div>
      @endif
    </div>
  </div>
</div>
@endforeach
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const orderDetails = document.querySelectorAll('.order-detail-link');

        orderDetails.forEach(detail => {
            detail.addEventListener('click', function() {
                const orderId = this.getAttribute('data-id');
                alert('Chi tiết đơn hàng: ' + orderId);
            });
        });
    });
</script>
