@extends('user.layout.layout')

@section('content')
<!-- Start Shop Area  -->
<div class="axil-single-product-area axil-section-gap pb--0 bg-color-white">
    <div class="single-product-thumb mb--40">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mb--40">
                    <div class="row">
                        <div class="col-lg-10 order-lg-2">
                            <div class="single-product-thumbnail-wrap zoom-gallery">
                                <div class="single-product-thumbnail product-large-thumbnail-3 axil-product">
                                    <div class="thumbnail">
                                        <a href="{{ asset('product/'.$product->image) }}" class="image-popup">
                                            <img src="{{ asset('product/'.$product->image) }}" alt="Product Images">
                                        </a>
                                    </div>
                                </div>
                                <div class="product-quick-view position-view">
                                    <a href="{{ asset('product/'.$product->image) }}" class="popup-zoom">
                                        <i class="far fa-search-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 order-lg-1">
                            <div class="product-small-thumb-3 small-thumb-wrapper">
                                <div class="small-thumb-img">
                                    <img src="{{ asset('product/'.$product->image) }}" alt="thumb image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 mb--40">
                    <div class="single-product-content">
                        <div class="inner">
                            <h2 class="product-title">{{ $product->name }}</h2>
                            <span class="price-amount">Rp. {{ number_format($product->harga) }}</span>
                            <p class="description">{{ $product->deskripsi }}</p>

                            <!-- Start Product Action Wrapper  -->
                            <form action="/cart" method="post">
                                @csrf
                                @method('post')
                                <div class="product-action-wrapper d-flex-center">
                                    <input hidden name="id_product" value="{{ $product->id }}" type="text">
                                    <!-- Start Quentity Action  -->
                                    <div class="pro-qty"><input type="text" name="jumlah" value="1"></div>
                                    <!-- End Quentity Action  -->

                                    <!-- Start Product Action  -->
                                    <ul class="product-action d-flex-center mb--0">
                                        <button type="submit" class="axil-btn btn-bg-primary">Add to Cart</button>
                                    </ul>
                                    <!-- End Product Action  -->


                                </div>
                                @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show mt-2">



                                    <?php

                                        $nomer = 1;

                                        ?>

                                    @foreach($errors->all() as $error)
                                    <li>{{ $nomer++ }}. {{ $error }}</li>
                                    @endforeach
                                </div>
                                @endif
                            </form>
                            <!-- End Product Action Wrapper  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End .single-product-thumb -->

    <div class="woocommerce-tabs wc-tabs-wrapper bg-vista-white">
        <div class="container">
            <ul class="nav tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                    <div class="product-desc-wrapper">
                        <div class="row">
                            <div class="col-lg-6 mb--30">
                                <div class="single-desc">
                                    <p>{{ $product->deskripsi }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- End .row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="pro-des-features">
                                    <li class="single-features">
                                        <div class="icon">
                                            <img src="{{ asset('user/assets/images/product/product-thumb/icon-3.png') }}" alt="icon">
                                        </div>
                                        Easy Returns
                                    </li>
                                    <li class="single-features">
                                        <div class="icon">
                                            <img src="{{ asset('user/assets/images/product/product-thumb/icon-2.png') }}" alt="icon">
                                        </div>
                                        Quality Service
                                    </li>
                                    <li class="single-features">
                                        <div class="icon">
                                            <img src="{{ asset('user/assets/images/product/product-thumb/icon-1.png') }}" alt="icon">
                                        </div>
                                        Original Product
                                    </li>
                                </ul>
                                <!-- End .pro-des-features -->
                            </div>
                        </div>
                        <!-- End .row -->
                    </div>
                    <!-- End .product-desc-wrapper -->
                </div>
            </div>
        </div>
    </div>
    <!-- woocommerce-tabs -->

</div>
<!-- End Shop Area  -->

<!-- Start Recently Viewed Product Area  -->
<div class="axil-product-area bg-color-white axil-section-gap pb--50 pb_sm--30">
    <div class="container">
        <div class="section-title-wrapper">
            <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i> Your Recently</span>
            <h2 class="title">Viewed Items</h2>
        </div>
        <div class="recent-product-activation slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
            @foreach ($productbycategori as $item)
            <div class="slick-single-layout">
                <div class="axil-product">
                    <div class="thumbnail">
                        <a href="/detail/{{ $item->id }}">
                            <img src="{{ asset('product/'.$item->image) }}" alt="Product Images">
                        </a>
                        <div class="label-block label-right">
                            <div class="product-badget">{{ $item->category->name }}</div>
                        </div>
                    </div>
                    <div class="product-content">
                        <div class="inner">
                            <h5 class="title"><a href="/detail/{{ $item->id }}">{{ $item->name }}</a></h5>
                            <div class="product-price-variant">
                                <span class="price current-price">Rp. {{ number_format($item->harga) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
