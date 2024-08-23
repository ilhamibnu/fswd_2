@extends('user.layout.layout')

@section('content')
<!-- Start Breadcrumb Area  -->
<div class="axil-breadcrumb-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-8">
                <div class="inner">
                    <ul class="axil-breadcrumb">
                        <li class="axil-breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="separator"></li>
                        <li class="axil-breadcrumb-item active" aria-current="page">My Account</li>
                    </ul>
                    <h1 class="title">Explore All Products</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-4">
                <div class="inner">
                    <div class="bradcrumb-thumb">
                        <img src="{{ asset('user/assets/images/product/product-45.png') }}" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb Area  -->

<!-- Start My Account Area  -->
<div class="axil-dashboard-area axil-section-gap">
    <div class="container">
        <div class="axil-dashboard-warp">
            <div class="axil-dashboard-author">
                <div class="media">
                    <div class="thumbnail">
                        <img src="{{ asset('user/assets/images/product/author1.png') }}" alt="{{ Auth::user()->name }}">
                    </div>
                    <div class="media-body">
                        <h5 class="title mb-0">{{ Auth::user()->name }}</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-md-4">
                    <aside class="axil-dashboard-aside">
                        <nav class="axil-dashboard-nav">
                            <div class="nav nav-tabs" role="tablist">
                                <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-dashboard" role="tab" aria-selected="true"><i class="fas fa-th-large"></i>Dashboard</a>
                                <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-orders" role="tab" aria-selected="false"><i class="fas fa-shopping-basket"></i>Orders</a>
                                <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-account" role="tab" aria-selected="false"><i class="fas fa-user"></i>Account Details</a>
                                <a class="nav-item nav-link" href="/logout"><i class="fal fa-sign-out"></i>Logout</a>
                            </div>
                        </nav>
                    </aside>
                </div>
                <div class="col-xl-9 col-md-8">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="nav-dashboard" role="tabpanel">
                            <div class="axil-dashboard-overview">
                                <div class="welcome-text">Hello {{ Auth::user()->name }}</div>
                                <p>From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-orders" role="tabpanel">
                            <div class="axil-dashboard-order">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Order</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transaksi as $item )
                                            <tr>
                                                <th scope="row">{{ $item->no_transaksi }}</th>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->status_pembayaran }}</td>
                                                <td>Rp. {{ number_format($item->total_harga) }}</td>
                                                <td><a href="/cart/checkout/{{ $item->id }}" class="axil-btn view-btn">View</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-account" role="tabpanel">
                            <div class="col-lg-9">
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
                                <div class="axil-dashboard-account">
                                    <form action="/updateprofil" method="post" class="account-details-form">
                                        @csrf
                                        @method('POST')
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" name="email" class="form-control" value="{{ Auth::user()->email }}">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <h5 class="title">Password Change</h5>
                                                <div class="form-group">
                                                    <label>New Password</label>
                                                    <input name="password" type="password" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Confirm New Password</label>
                                                    <input name="repassword" type="password" class="form-control">
                                                </div>
                                                <div class="form-group mb--0">
                                                    <button type="submit" class="axil-btn" value="Save Changes">Save Changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End My Account Area  -->
@endsection
