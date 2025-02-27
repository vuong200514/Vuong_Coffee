@extends('/layouts/main')

@push('css-dependencies')
<link href="/css/review.css" rel="stylesheet" />
@endpush

@push('scripts-dependencies')
<script src="/js/review.js"></script>
@endpush

@push('modals-dependencies')
@include('/partials/review/edit_review_modal')
@endpush

@section('content')
<div class="container-xl">

  <!-- flasher -->
  @if(session()->has('message'))
  {!! session("message") !!}
  @endif

  <div class="col-md-12">
    <div class="offer-dedicated-body-left">
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade active show" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab">
          <!-- tổng quan sản phẩm -->
          <div id="overview-product"
            class="bg-white rounded shadow-sm p-4 mb-4 clearfix restaurant-detailed-star-rating mt-3">
            <div class="row">
              <div class="col-12 col-sm-auto mb-3">
                <img class="img-account-profile mb-2" src="{{ '/'.'storage/' . $product->image }}" width="200"
                  alt="" />
              </div>
              <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                <div class="text-sm-left mb-2 mb-sm-0">
                  <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">
                    {{ $product->product_name }}
                  </h4>
                  <div class="text-muted">
                    <small>
                      {{ $product->description }}
                    </small>
                  </div>
                  <div class="text-muted mt-3">
                    <span>Giá : </span>
                    <span>
                      {{ $product->price }}
                    </span>
                  </div>
                  <div class="text-muted">
                    <span>Có sẵn : </span>
                    <span>
                      {{ $product->stock }} sản phẩm
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- biểu đồ đánh giá và nhận xét -->
          <div class="bg-white rounded shadow-sm p-4 mb-4 clearfix graph-star-rating">
            <h5 class="mb-0 mb-4">Đánh giá và Nhận xét</h5>
            <div class="graph-star-rating-header">
              <div class="ratings">
                <?php
                $rating_sum = round($rate, 2);
                for ($i = 1; $i <= 5; $i++) {
                if ($i <= $rating_sum) {
                    echo '<i class="fa fa-star rating-color"></i>';
                } else if ($i - 0.5 <= $rating_sum) {
                    echo '<i class="fa fa-star-half-stroke rating-color"></i>';
                } else {
                    echo '<i class="fa fa-star"></i>';
                }
                }
                ?>
              </div>
              <p class="text-black mb-4 mt-2">Được đánh giá
                {{ round($rate, 2) }} trên 5
              </p>
            </div>
            <div class="graph-star-rating-body">
              @for ($star = 4; 0 <= $star; $star--) <div class="rating-list">
                <div class="rating-list-left text-black">
                  {{ $star + 1 }} Sao
                </div>
                <div class="rating-list-center">
                  <div class="progress">
                    <div style="width: {{ ($sum == 0) ? 0 : $starCounter[$star] / $sum * 100 }}%"
                      aria-valuemax="{{ $star }}" aria-valuemin="0" aria-valuenow="<?= $star; ?>" role="progressbar"
                      class="progress-bar bg-warning">
                    </div>
                  </div>
                </div>
                <div class="rating-list-right text-black">
                  {{ ($sum == 0) ? 0 : round($starCounter[$star] / $sum * 100) }}%
                </div>
            </div>
            @endfor
          </div>
        </div>

        <!-- Đánh giá và nhận xét từ người dùng -->
        <div class="bg-white rounded shadow-sm p-4 mb-4 restaurant-detailed-ratings-and-reviews">
          <div class="d-flex justify-content-between">
            <h5 class="mb-1">Tất cả Đánh giá và Nhận xét</h5>
            <a href="#" class="btn btn-outline-secondary btn-sm float-end">Cuộn đến Sản phẩm</a>
          </div>
          <div class="reviews-members pt-4 pb-4">

            @if ($reviews != "[]")
            <!-- nội dung đánh giá -->
            <?php foreach ($reviews as $review) : ?>
            <div class="media d-flex">
              <a href="#"><img alt="Generic placeholder image" src="{{ '/'.'storage/' . $review->user->image }}"
                  class="mr-3 mt-3 rounded-pill"></a>
              <div class="media-body w-100">
                <div class="d-flex justify-content-between align-items center">
                  <div class="reviews-members-header">
                    <!-- đánh giá sao -->
                    <div class="ratings">
                      <?php
                      $rating_sum = $review["rating"];
                      for ($i = 0; $i < 5; $i++) {
                        if ($i < $rating_sum) {
                          echo '<i class="fa fa-star rating-color" style="font-size:  0.75rem;"></i>';
                        } else {
                          echo '<i class="fa fa-star" style="font-size: 0.75rem;"></i>';
                        }
                      }
                      ?>
                    </div>
                    <h6 class="my-1"><a class="text-black" href="#">@
                        {{ $review->user->username }}
                      </a></h6>
                    <small>
                      <p class="text-muted">
                        {{ $review->created_at }}
                      </p>
                    </small>
                  </div>
                  @if (auth()->user()->id == $review->user_id)
                  <div class="col-1 d-flex justify-content-evenly">
                    <a class="link_edit_review" title="chỉnh sửa đánh giá" data-idReview="{{ $review->id }}">
                      <button class="btn btn-primary p-1"><i class="fas fa-fw fa-solid fa-pen-nib m-0 "></i></button>
                    </a>
                    <form action="/review/delete_review/{{ $review->id }}" method="post" id="form_delete_review">
                      @csrf
                      <button class="btn btn-danger p-1" id="button_delete_review"><i
                          class="fas fa-fw fa-solid fa-trash-can m-0 "></i></button>
                    </form>
                  </div>
                  @endif
                </div>
                <div class="reviews-members-body">
                  <p>
                    {{ $review->review }}
                  </p>
                </div>
                <?php if ($review->is_edit == 1) : ?>
                <div class="w-100 d-flex justify-content-end">
                  <small class="text-muted">Đánh giá đã được chỉnh sửa vào {{ $review->updated_at }}</small>
                </div>
                <?php endif; ?>
              </div>
            </div>
            <?php endforeach; ?>
            @else
            <p class="link-grey">Oops, sản phẩm này hiện chưa có đánh giá nào.</p>
            @endif
          </div>
        </div>

        @if ($isPurchased && !$isReviewed)
        <!-- Form nhập đánh giá -->
        <form action="/review/add_review" method="post">
          @csrf
          <div class="bg-white rounded shadow-sm p-4 mb-5 rating-review-select-page">
            <h5 class="mb-4">Tạo đánh giá của bạn</h5>

            <p style="margin-bottom: 0 !important;">Chọn sao</p>

            <!-- đánh giá sao -->
            <div class="rating-wrapperr">

              <!-- sao 5 -->
              <input type="radio" id="5-star-rating" name="rating" value="5" {{ old("rating")=="5" ? 'checked' : '' }}>
              <label for="5-star-rating" class="star-rating">
                <i class="fas fa-star d-inline-block"></i>
              </label>

              <!-- sao 4 -->
              <input type="radio" id="4-star-rating" name="rating" value="4" {{ old("rating")=="4" ? 'checked' : '' }}>
              <label for="4-star-rating" class="star-rating star">
                <i class="fas fa-star d-inline-block"></i>
              </label>

              <!-- sao 3 -->
              <input type="radio" id="3-star-rating" name="rating" value="3" {{ old("rating")=="3" ? 'checked' : '' }}>
              <label for="3-star-rating" class="star-rating star">
                <i class="fas fa-star d-inline-block"></i>
              </label>

              <!-- sao 2 -->
              <input type="radio" id="2-star-rating" name="rating" value="2" {{ old("rating")=="2" ? 'checked' : '' }}>
              <label for="2-star-rating" class="star-rating star">
                <i class="fas fa-star d-inline-block"></i>
              </label>

              <!-- sao 1 -->
              <input type="radio" id="1-star-rating" name="rating" value="1" {{ old("rating")=="1" ? 'checked' : '' }}>
              <label for="1-star-rating" class="star-rating star">
                <i class="fas fa-star d-inline-block"></i>
              </label>
            </div>
            @error('rating')
            <div class="text-danger">{{ $message }}</div>
            @enderror

            <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}">
            <div class="form-group">
              <label>Đánh giá của bạn</label>
              <input class="form-control" name="review" id="review" value="{{ old('review') }}">
              @error('review')
              @enderror
            </div>
            <div class="form-group mt-3">
              <button class="btn btn-dark btn-sm" type="submit">Gửi đánh giá</button>
            </div>
          </div>
        </form>
        @endif
      </div>
    </div>
  </div>
</div>
</div>
@endsection
