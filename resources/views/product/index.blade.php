@extends('/layouts/main')

@push('css-dependencies')
<link rel="stylesheet" type="text/css" href="/css/product.css" />
@endpush

@push('scripts-dependencies')
<script src="/js/product.js" type="module"></script>
@endpush

@push('modals-dependencies')
@include('/partials/product/product_detail_modal')
@endpush

<style>
    .strikethrough {
        text-decoration: line-through;
    }
</style>

@section('content')
<section id="product" class="pb-5">
    <div class="container">

        @if(session()->has('message'))
        {!! session("message") !!}
        @endif

        <h5 class="section-title h1">Sản phẩm của chúng tôi</h5>
        @can('add_product', App\Models\Product::class)
        <div class="d-flex align-items-end flex-column mb-4">
            <a style="text-decoration: none;" href="/product/add_product">
                <div class="text-right button-kemren mr-lg-5 mr-sm-3 add-product-btn"></div>
            </a>
        </div>
        @else
        <div class="mb-5"></div>
        @endcan

        <div class="row justify-content-center">
            @foreach($product as $row)
            <div class="col-12 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column flex-md-row align-items-center">
                        <div class="col-12 col-md-4 product-image text-center">
                            <img class="img-fluid" src="{{ '/'.'storage/' . $row->image }}" alt="Tên sản phẩm">
                        </div>
                        <div class="col-12 col-md-8 d-flex flex-column justify-content-between">
                            <div class="product-info">
                                <h4 class="card-title">{{ $row->product_name }}</h4>
                                <p class="card-text">{{ $row->orientation }}</p>
                            </div>
                            <div class="product-buttons d-flex justify-content-between mt-2">
                                <button data-id="{{ $row->id }}" class="btn btn-primary btn-sm flex-grow-1 mx-1 detail">Chi tiết</button>
                                <a href="/review/product/{{ $row->id }}" class="btn btn-primary btn-sm flex-grow-1 mx-1">Đánh giá</a>
                                @can('edit_product', App\Models\Product::class)
                                <a href="/product/edit_product/{{ $row->id }}" class="btn btn-primary btn-sm flex-grow-1 mx-1">Chỉnh sửa</a>
                                @endcan
                                @can('create_order', App\Models\Order::class)
                                <a href="/order/make_order/{{ $row->id }}" class="btn btn-primary btn-sm flex-grow-1 mx-1">Mua</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</section>
@endsection
