@extends("layouts.general")

@section("title", "Show")

@section("content")
    <div class="main-wapper">
        <section class="main-content">
            <div class="container">
              <div class="row productBox">
                    <div class="col-lg-6">
                        <div class="product-left">
                            <div class="imageBox">
                                <img src="/images/{{$product->image}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-right">
                            <div class="back-to-the-index">
                                <a href="/products">
                                    <i class="fas fa-reply"></i>
                                    一覧ページへ戻る
                                </a>
                            </div>
                            <div class="single-nameBox pb-2">{{$product->name}}</div>
                            <div class="single-priceBox">
                                <div class="price-label">価格：</div>
                                <div class="single-price">¥{{$product->price}}</div>
                            </div>
                            <div class="single-description pb-3">{{$product->description}}</div>
                            <div class="single-pickup_timesBox">
                                <div class="pickup_times-label">希望受け取り日時：</div>
                                <div class="single-pickup_times">{{$product->pickup_times}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="single-product-locationBox">
                    <div class="row map-tab">出品者の希望する合流場所</div>
                    <div class="row single-product-location">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
