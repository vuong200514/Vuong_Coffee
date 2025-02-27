@extends('/layouts/main')

@push('css-dependencies')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
<link href="/css/transaction.css" rel="stylesheet" />
@endpush

@push('scripts-dependencies')
<script src="/js/transaction.js"></script>
<script src="/js/transaction_table.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#transaction_table').DataTable();

        // Hiệu ứng chuyển động cho các hàng trong bảng
        $('#transaction_table tbody').on('mouseenter', 'tr', function() {
            $(this).css('transform', 'scale(1.02)');
            $(this).css('box-shadow', '0 4px 8px rgba(0, 0, 0, 0.2)');
        });

        $('#transaction_table tbody').on('mouseleave', 'tr', function() {
            $(this).css('transform', 'scale(1)');
            $(this).css('box-shadow', 'none');
        });
    });
</script>
@endpush

@section('content')
<main>
  <div class="container-fluid px-4 mt-4">

    <!-- flasher -->
    @if(session()->has('message'))
    {!! session("message") !!}
    @endif

    @include('/partials/breadcumb')

    <div class="card mb-4">
      <div class="card-header">
        <i class="fas fa-fw fa-solid fa-money-check-dollar me-1"></i>
        Giao dịch
      </div>
      <div class="card-body">
        <a href="/transaction/add_outcome" title="thêm chi phí" class="float-end mb-3">
          <button class='btn btn-secondary'>Thêm chi phí</button>
        </a>
        <table id="transaction_table">
          <thead>
            <tr>
              <th>Chỉ số</th>
              <th>Tiêu đề</th>
              <th>Mô tả</th>
              <th>Thu nhập</th>
              <th>Chi phí</th>
              <th>Ngày tạo</th>
              <th>Ngày cập nhật</th>
              <th>Giao diện</th>
            </tr>
          </thead>
          <tbody>
            @php
            $inc = 0
            @endphp
            @foreach ($transactions as $transaction)
            <tr>
              <td>{{ ++$inc }}</td>
              <td>{{ $transaction->category->category_name }}</td>
              <td>{{ $transaction->description }}</td>
              <td>{{$transaction->income ? $transaction->income : "----"}}</td>
              <td>{{$transaction->outcome ? $transaction->outcome : "----"}}</td>
              <td>{{$transaction->created_at->format('d-m-Y')}}</td>
              <td>{{$transaction->updated_at->format('d-m-Y')}}</td>
              <td>
                <button class="btn btn-secondary button_edit_transaction" data-transactionId="{{ $transaction->id }}"
                  data-isOutcome="{{ $transaction->outcome? '1' : '0' }}"><i class="fas fa-solid fa-marker"></i>
                </button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
@endsection
