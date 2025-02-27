@extends('/layouts/main')

@push('css-dependencies')
<link rel="stylesheet" type="text/css" href="/css/order.css" />
@endpush

@push('scripts-dependencies')
<script src="/js/make_order.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push('modals-dependencies')
@include('/partials/order/transfer_instructions_modal')
@endpush

@section('content')
<div class="container-fluid px-2 px-lg-4">
  <h1 class="main-title">
    {{ $title }}
  </h1>
  <div class="row">

    <!-- Left -->
    <div class="col-12 col-lg-9">
      <div class="accordion" id="accordionMain">

        <!-- top field -->
        <div class="accordion-item mb-3 px-4 py-3">
          <form action="/order/make_order" method="post">
                @csrf
                <!-- hidden input -->
                <input type="hidden" id="total_price" name="total_price" value="0">
                <input type="hidden" name="product_id" value="{{ old('product_id', $product->id) }}">
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="status_id" value="2"> <!-- Default status_id -->
                <input type="hidden" name="is_done" value="0"> <!-- Default is_done -->

                <div class="row mb-3">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="product_name">Tên sản phẩm</label>
                            <input id="product_name" name="product_name" value="{{ $product->product_name }}" type="text" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="price">Giá sản phẩm</label>
                            @if ($product->discount == 0)
                            <input type="hidden" id="price" name="price" data-truePrice="{{ old('price', $product->price) }}" value="VND {{ old('price', $product->price) }}" type="text" class="form-control" disabled>
                            @else
                            <input type="hidden" id="price" name="price" data-truePrice="{{ old('price', ((100 - $product->discount)/100) * $product->price) }}" value="VND {{ old('price', ((100 - $product->discount)/100) *$product->price) }}" type="text" class="form-control" disabled>
                            @endif
                            <div class="input-group" style="display:unset;">
                                <div class="input-group-prepend">
                                    @if ($product->discount == 0)
                                    <span class="input-group-text">
                                        {{ $product->price }}
                                    </span>
                                    @else
                                    <span class="input-group-text">VND {{ ((100 - $product->discount)/100) * $product->price }} <span class="strikethrough ms-4">
                                            {{ $product->price }}
                                        </span><sup><sub class="mx-1">sale</sub>
                                            {{ $product->discount }}%
                                        </sup>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-2">
                    <label for="quantity">Số lượng</label>
                    <input id="quantity" name="quantity" data-productId="{{ $product->id }}" value="{{ old('quantity', '0' ) }}" type="number" min="0" class="form-control @error('quantity') is-invalid @enderror" onchange="myCounter()">
                </div>
                <div class="mb-3 col-12">
                    @error('quantity')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="address">Địa chỉ</label>
                    <input type="hidden" name="shipping_address" id="shipping_address">
                    <input id="address" name="address" type="text" class="form-control @error('address') is-invalid @enderror" value="{{ old('address', auth()->user()->address) }}">
                    @error('address')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-2">Submit</button>
            </form>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!--Banking -->
        <div class="accordion-item mb-3 ">
          <h2 class="h5 px-4 py-3 accordion-header d-flex justify-content-between align-items-center">
            <div class="form-check w-100 collapsed">
              <input class="form-check-input" type="radio" name="payment_method" id="online_bank"
                data-bs-toggle="collapse" data-bs-target="#collapseCC" aria-expanded="false" value="1" {{
                old('payment_method')=='1' ? 'checked' : '' }} onclick="hideMessage('bank')">
              <label class="form-check-label pt-1" for="online_bank" data-bs-toggle="collapse"
                data-bs-target="#collapseCC" aria-expanded="false" onclick="hideMessage('bank')">
                Chuyển khoản
              </label>
              @error('payment_method')
              <div class="text-danger" id="bank_alert">{{ $message }}</div>
              @enderror
            </div>
            <span>
              <img src="{{ ('/'.'storage/icons/online-banking.png') }}" height="50px" alt="logo online banking">
            </span>
          </h2>
          <div id="collapseCC" class="accordion-collapse collapse {{ old('payment_method')==1 ? 'show' : '' }}"
            data-bs-parent="#accordionMain">
            <div class="accordion-body">
                <div>Chọn ngân hàng:</div>
                <div id="mbbank" class="form-check w-100 collapsed">
                  <span><img src="{{ ('/'.'storage/icons/bank-mb.png') }}" alt="MB logo" width="40px"></span>
                  <input type="radio" id="bank_mbbank" class="bank" name="bank_id" value="1" {{ old('bank_id')=='1' ? 'checked' : '' }} style="appearance: none;">
                  <label for="bank_mbbank" class="colapse_pilih_bank" data-bs-toggle="collapse" data-bs-target="#section_mbbank" aria-expanded="false" style="cursor: pointer;" onclick="hideBankMessage()">MB Bank</label>
                  <div id="section_mbbank" class="accordion-collapse collapse collapse-pilih-bank" data-bs-parent="#collapseCC">
                    <div class="divider"></div>
                    <div class="d-flex justify-content-between">
                      <small class="rek-title">Tài khoản </small>
                      <small class="rek-title">Chủ tài khoản </small>
                    </div>
                    <div class="d-flex justify-content-between mt-1">
                      <small class="no-rek">882005131188</small>
                      <small class="salin-rek">Đào Mạnh Vương</small>
                    </div>
                    <div class="divider"></div>
                    <small class="note">Sẽ được kiểm tra trong 10 phút sau khi thanh toán thành công</small>
                  </div>
                </div>
                @error('bank_id')
                <div class="text-danger mt-3" id="bank_id_alert">{{ $message }}</div>
                @enderror
              <div class="container mt-3" id="container-petunjuk">
                <div class="mt-4">
                  <h6>Chuyển khoản</h6>
                  <p class="text-muted">Tài khoản Ngân hàng MB chỉ chấp nhận chuyển khoản từ các tài khoản Ngân hàng MB. Để thanh toán bằng tài khoản Ngân hàng MB, hãy sử dụng tài khoản ảo của Ngân hàng MB. Dưới đây là hướng dẫn chuyển khoản nếu bạn sử dụng Ngân hàng MB.                  </p>
                </div>
                <div class="d-flex justify-content-end">
                  <a class="btn btn-info px-1 py-0" href="#TransferInstructionsModal" data-bs-toggle="modal">See More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3 border">
          <h2 class="h5 px-4 py-3 accordion-header d-flex justify-content-between align-items-center">
            <div class="form-check w-100 collapsed">
              <input class="form-check-input" type="radio" name="payment_method" id="cod" data-bs-toggle="collapse"
                data-bs-target="#collapsePP" aria-expanded="false" value="2" {{ old('payment_method')=='2' ? 'checked'
                : '' }} onclick="hideMessage('cod')">
              <label class="form-check-label pt-1" for="cod" data-bs-toggle="collapse" data-bs-target="#collapsePP"
                aria-expanded="false" onclick="hideMessage('cod')">
                Thanh toán khi nhận hàng
              </label>
              @error('payment_method')
              <div class="text-danger" id="cod_alert">{{ $message }}</div>
              @enderror
            </div>
            <span>
              <img src="{{ ('/'.'storage/icons/cash-on-delivery.png') }}" height="50px" alt="logo COD" />
            </span>
          </h2>
          <div id="collapsePP" class="accordion-collapse collapse  {{ old('payment_method')==2 ? 'show' : '' }}"
            data-bs-parent="#accordionMain">
            <div class="accordion-body">
              <div class="content-cod">
                <div class="note-cod">Note: Sử dụng dịch vụ thanh toán khi nhận hàng sẽ bị tính thêm phí áp dụng</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Right -->
    <div class="col-12 col-lg-3">
      <div class="card position-sticky top-0">
        <div class="p-3 bg-light bg-opacity-10">
          <h6 class="card-title mb-3">Hóa đơn</h6>
          {{-- transaction resume --}}
          <div id="transaction">
            <div class="d-flex justify-content-between mb-1 small">
              <span>Tổng tiền nước</span> <span><span></span> <span id="sub-total">0</span> VND</span>
            </div>
            <div class="d-flex justify-content-between mb-1 small">
                <span>Phí ship</span><span>
                    <span></span><span id="shipping" data-shippingCost="15000">15,000 VND</span>
                </span>
            </div>
          </div>
          <hr>
          <div class="d-flex justify-content-between mb-4 small">
            <span>Tổng</span> <strong class="text-dark"><span></span><span id="total">0</span> VND</strong>
            <input type="hidden" id="total_price" name="total_price" value="0">
          </div>
          <div class="form-group small mb-3">
            Nếu xảy ra lỗi vui lòng liên hệ: <a
              class="link-danger"
              href="https://www.facebook.com/hvuong205"
              target="_blank" style="text-decoration: none;">@Vuong</a>
          </div>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection
