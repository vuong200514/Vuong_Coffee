<div class="panel-heading d-flex justify-content-between align-items-center">
    <h1 class="main-title">
      <?= $title; ?>
    </h1>
    @if ($title == "Dữ liệu đơn hàng")
    <div class="btn-group pull-right">
      <div class="btn-group">
        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-bs-toggle="dropdown">Lọc lịch sử
          <i class="fa fa-filter"></i></button>
        <ul class="dropdown-menu dropdown-menu-end">
          @foreach ($status as $item)
          @if ($item->id != "4")
          <a href="/order/order_data/{{ $item->id }}">
            <li class="dropdown-item">{{ $item->order_status }}
            </li>
          </a>
          @endif
          @endforeach
          <li>
            <hr class="dropdown-divider">
          </li>
          <a href="/order/order_data">
            <li class="dropdown-item">Hiển thị tất cả
            </li>
          </a>
        </ul>
      </div>
    </div>
    @endif
  </div>
