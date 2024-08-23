@extends('user.layout.layout')

@section('content')
<div class="axil-main-slider-area main-slider-style-1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-sm-6">
                <div class="main-slider-content">
                    <div class="slider-content-activation-one">
                        <div class="single-slide slick-slide" data-sal="slide-up" data-sal-delay="400" data-sal-duration="800">
                            <span class="subtitle"><i class="fas fa-fire"></i> Online Store</span>
                            <h1 class="title">Smartphone & Laptop</h1>
                            <div class="slide-action">
                                <div class="shop-btn">
                                    <a href="/" class="axil-btn btn-bg-white"><i class="fal fa-shopping-cart"></i>Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-sm-6">
                <div class="main-slider-large-thumb">
                    <div class="slider-thumb-activation-one axil-slick-dots">
                        <div class="single-slide slick-slide" data-sal="slide-up" data-sal-delay="600" data-sal-duration="1500">
                            <img src="{{ asset('user/assets/images/product/product-38.png') }}" alt="Product">
                        </div>
                        <div class="single-slide slick-slide" data-sal="slide-up" data-sal-delay="600" data-sal-duration="1500">
                            <img src="{{ asset('user/assets/images/product/product-39.png') }}" alt="Product">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ul class="shape-group">
        <li class="shape-1"><img src="{{ asset('user/assets/images/others/shape-1.png') }}" alt="Shape"></li>
        <li class="shape-2"><img src="{{ asset('user/assets/images/others/shape-2.png') }}" alt="Shape"></li>
    </ul>
</div>

<!-- Start Categorie Area  -->
<div class="axil-categorie-area bg-color-white axil-section-gapcommon">
    <div class="container">
        <div class="section-title-wrapper">
            <span class="title-highlighter highlighter-secondary"> <i class="far fa-tags"></i> Categories</span>
            <h2 class="title">Browse by Category</h2>
        </div>
        <div class="categrie-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
            @foreach ($kategori as $item )
            <div class="slick-single-layout">
                <div class="categrie-product" data-sal="zoom-out" data-sal-delay="200" data-sal-duration="500">
                    <a href="#">
                        <img class="img-fluid" src="{{ asset('user/assets/images/product/categories/elec-4.png') }}" alt="product categorie">
                        <h6 class="cat-title">{{ $item->name }}</h6>
                    </a>
                </div>
                <!-- End .categrie-product -->
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End Categorie Area  -->

<!-- Start Expolre Product Area  -->
<div class="axil-product-area bg-color-white axil-section-gap">
    <div class="container">
        <div class="section-title-wrapper">
            <span class="title-highlighter highlighter-primary"> <i class="far fa-shopping-basket"></i> Our Products</span>
            <h2 class="title">Explore our Products</h2>
        </div>
        <!-- Start Shop Area  -->
        <div class="axil-shop-area axil-section-gap bg-color-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="axil-shop-top">
                            <div class="row">
                                <form action="/" method="get" class="row">
                                    <div class="col-lg-9">
                                        <div class="category-select">
                                            <!-- Start Single Select  -->
                                            <select name="id_kategori" class="single-select">
                                                <option value="">All Categories</option>
                                                @foreach ($kategori as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <!-- End Single Select  -->

                                            <select name="filter" class="single-select">
                                                <option value="">Sort by Default</option>
                                                <option value="1">Sort by Latest</option>
                                                <option value="2">Sort by Price: low to high</option>
                                                <option value="3">Sort by Price: high to low</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <button type="submit" class="axil-btn btn-bg-primary btn-sm">Filter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row--15">
                    @foreach ($product as $item )
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="axil-product product-style-one has-color-pick mt--40">
                            <div class="thumbnail">
                                <a href="/detail/{{ $item->id }}">
                                    <img src="{{ asset('product/'.$item->image) }}" alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">{{ $item->category->name }}</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option"><a href="/detail/{{ $item->id }}">Detail</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="/detail/{{ $item->id }}">{{ $item->name }}</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price current-price">Rp. {{ number_format($item->harga) }}</span>
                                        {{-- <span class="price old-price">$30</span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{-- <div class="text-center pt--30">
                    <a href="#" class="axil-btn btn-bg-lighter btn-load-more">Load more</a>
                </div> --}}
            </div>
            <!-- End .container -->
        </div>
        <!-- End Shop Area  -->
    </div>
</div>
<!-- End Expolre Product Area  -->

<!-- Start Why Choose Area  -->
<div class="axil-why-choose-area pb--50 pb_sm--30">
    <div class="container">
        <div class="section-title-wrapper section-title-center">
            <span class="title-highlighter highlighter-secondary"><i class="fal fa-thumbs-up"></i>Why Us</span>
            <h2 class="title">Why People Choose Us</h2>
        </div>
        <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 row--20">
            <div class="col">
                <div class="service-box">
                    <div class="icon">
                        <img src="{{ asset('user/assets/images/icons/service6.png') }}" alt="Service">
                    </div>
                    <h6 class="title">Fast &amp; Secure Delivery</h6>
                </div>
            </div>
            <div class="col">
                <div class="service-box">
                    <div class="icon">
                        <img src="{{ asset('user/assets/images/icons/service7.png') }}" alt="Service">
                    </div>
                    <h6 class="title">100% Guarantee On Product</h6>
                </div>
            </div>
            <div class="col">
                <div class="service-box">
                    <div class="icon">
                        <img src="{{ asset('user/assets/images/icons/service8.png') }}" alt="Service">
                    </div>
                    <h6 class="title">24 Hour Return Policy</h6>
                </div>
            </div>
            <div class="col">
                <div class="service-box">
                    <div class="icon">
                        <img src="{{ asset('user/assets/images/icons/service9.png') }}" alt="Service">
                    </div>
                    <h6 class="title">24 Hour Return Policy</h6>
                </div>
            </div>
            <div class="col">
                <div class="service-box">
                    <div class="icon">
                        <img src="{{ asset('user/assets/images/icons/service10.png') }}" alt="Service">
                    </div>
                    <h6 class="title">Next Level Pro Quality</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Why Choose Area  -->
@endsection
