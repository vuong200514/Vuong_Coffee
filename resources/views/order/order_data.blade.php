@extends('/layouts/main')

@push('css-dependencies')
<link rel="stylesheet" type="text/css" href="/css/order.css" />
@endpush

@push('scripts-dependencies')
<script src="/js/order_data.js" type="module"></script>
@endpush

@section('content')
<div class="container">

  <!-- flasher -->
  @if(session()->has('message'))
  {!! session("message") !!}
  @endif

  <div class="panel panel-default panel-order">

    @include('/partials/order/filter')

    <div class="panel-body mt-3">
      @if (count($orders) > 0)

      @include('/partials/order/order_lists')

      @else

      @include('/partials/order/blank_data')

      @endif

    </div>
  </div>
</div>
@endsection
@media (max-width: 768px) {
    .panel-order .row .col-md-1 img {
        width: 300px;
        max-height: 300px;
    }
}
