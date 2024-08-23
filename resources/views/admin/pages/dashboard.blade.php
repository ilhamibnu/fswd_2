@extends('admin.layout.layout')

@section('title', 'Dashboard')

@section('title-bar', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-6 col-xxl-12">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card avtivity-card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="fs-14 mb-2">Product</p>
                                    <span class="title text-black font-w600">{{ $jumlah_product }}</span>
                                </div>
                            </div>
                            <div class="progress" style="height:5px;">
                                <div class="progress-bar bg-success" style="width: 42%; height:5px;" aria-label="Progess-success" role="progressbar">
                                    <span class="sr-only">42% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="effect bg-success"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card avtivity-card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="fs-14 mb-2">Kategori</p>
                                    <span class="title text-black font-w600">{{ $jumlah_kategori }}</span>
                                </div>
                            </div>
                            <div class="progress" style="height:5px;">
                                <div class="progress-bar bg-success" style="width: 42%; height:5px;" aria-label="Progess-success" role="progressbar">
                                    <span class="sr-only">42% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="effect bg-success"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card avtivity-card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="fs-14 mb-2">Transaksi</p>
                                    <span class="title text-black font-w600">{{ $jumlah_transaksi }}</span>
                                </div>
                            </div>
                            <div class="progress" style="height:5px;">
                                <div class="progress-bar bg-success" style="width: 42%; height:5px;" aria-label="Progess-success" role="progressbar">
                                    <span class="sr-only">42% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="effect bg-success"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card avtivity-card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="fs-14 mb-2">User</p>
                                    <span class="title text-black font-w600">{{ $jumlah_user }}</span>
                                </div>
                            </div>
                            <div class="progress" style="height:5px;">
                                <div class="progress-bar bg-success" style="width: 42%; height:5px;" aria-label="Progess-success" role="progressbar">
                                    <span class="sr-only">42% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="effect bg-success"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
