@extends('admin.layout.layout')

@section('title', 'Data Product')

@section('title-bar', 'Data Product')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Product</h4>
                </div>
                <div class="text-end m-2">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#Add" class="btn btn-success shadow btn-xs sharp me-1"><i class="fa fa-add"></i></a>
                </div>
                <div class="card-body">
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
                    <div class="table-responsive">
                        <table id="test" class="display min-w850">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Harga</th>
                                    <th>Deskripisi</th>
                                    <th>Kategori</th>
                                    <th>Stok Awal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $data )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img class="rounded-circle" width="35" src="{{ asset('product/'.$data->image) }}" alt=""></td>
                                    <td>{{ $data->name }}</td>
                                    <td>Rp. {{ number_format($data->harga) }}</td>
                                    <td>{{ $data->deskripsi }}</td>
                                    <td>{{ $data->category->name }}</td>
                                    <td>{{ $data->stok_awal }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#Edit{{ $data->id }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#Delete{{ $data->id }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <!-- edit -->
                                <div class="modal fade" id="Edit{{ $data->id }}">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                </button>
                                            </div>
                                            <form action="/admin/product/{{ $data->id }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="modal-body">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label>Image</label>
                                                            <input type="file" name="image" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label>Name</label>
                                                            <input type="text" value="{{ $data->name }}" name="name" class="form-control" placeholder="John">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label>Kategori</label>
                                                            <select name="id_category" class="form-control">
                                                                <option value="{{ $data->id_category }}">{{ $data->category->name }}</option>
                                                                @foreach ($kategori as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label>Harga</label>
                                                            <input type="text" value="{{ $data->harga }}" name="harga" class="form-control" placeholder="
                                                            10000">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label>Deskripsi</label>
                                                            <textarea name="deskripsi" class="form-control" placeholder="Deskripsi">{{ $data->deskripsi }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label>Stok Awal</label>
                                                            <input type="text" value="{{ $data->stok_awal }}" name="stok_awal" class="form-control" placeholder="100">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- edit -->
                                <!-- delete -->
                                <div class="modal fade" id="Delete{{ $data->id }}">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                </button>
                                            </div>
                                            <div class="modal-body">Anda Yakin Akan Menghapus {{ $data->name }} ?</div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                <form action="/admin/product/{{ $data->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-primary">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- delete -->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- add -->
    <div class="modal fade" id="Add">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <form action="/admin/product" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Name Product">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="id_category" class="form-control">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="text" name="harga" class="form-control" placeholder="10000">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" placeholder="Deskripsi"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label>Stok Awal</label>
                                <input type="text" name="stok_awal" class="form-control" placeholder="100">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- add -->
</div>
@endsection

@section('script')

@if(Session::get('store'))
<script>
    toastr.success("Data Berhasil Ditambahkan", "Info", {
        timeOut: 5000
        , closeButton: !0
        , debug: !1
        , newestOnTop: !0
        , progressBar: !0
        , positionClass: "toast-top-right"
        , preventDuplicates: !0
        , onclick: null
        , showDuration: "300"
        , hideDuration: "1000"
        , extendedTimeOut: "1000"
        , showEasing: "swing"
        , hideEasing: "linear"
        , showMethod: "fadeIn"
        , hideMethod: "fadeOut"
        , tapToDismiss: !1
    })

</script>
@endif

@if(Session::get('update'))
<script>
    toastr.success("Data Berhasil Diubah", "Info", {
        timeOut: 5000
        , closeButton: !0
        , debug: !1
        , newestOnTop: !0
        , progressBar: !0
        , positionClass: "toast-top-right"
        , preventDuplicates: !0
        , onclick: null
        , showDuration: "300"
        , hideDuration: "1000"
        , extendedTimeOut: "1000"
        , showEasing: "swing"
        , hideEasing: "linear"
        , showMethod: "fadeIn"
        , hideMethod: "fadeOut"
        , tapToDismiss: !1
    })

</script>
@endif

@if(Session::get('destroy'))
<script>
    toastr.success("Data Berhasil Dihapus", "Info", {
        timeOut: 5000
        , closeButton: !0
        , debug: !1
        , newestOnTop: !0
        , progressBar: !0
        , positionClass: "toast-top-right"
        , preventDuplicates: !0
        , onclick: null
        , showDuration: "300"
        , hideDuration: "1000"
        , extendedTimeOut: "1000"
        , showEasing: "swing"
        , hideEasing: "linear"
        , showMethod: "fadeIn"
        , hideMethod: "fadeOut"
        , tapToDismiss: !1
    })

</script>
@endif
<script>
    $('#test').DataTable({
        autoWidth: true,
        // "lengthMenu": [
        //     [16, 32, 64, -1],
        //     [16, 32, 64, "All"]
        // ]
        dom: 'Bfrtip',


        lengthMenu: [
            [10, 25, 50, -1]
            , ['10 rows', '25 rows', '50 rows', 'Show all']
        ],

        buttons: [{
                extend: 'colvis'
                , className: 'btn btn-primary btn-sm'
                , text: 'Column Visibility',
                // columns: ':gt(0)'


            },

            {

                extend: 'pageLength'
                , className: 'btn btn-primary btn-sm'
                , text: 'Page Length',
                // columns: ':gt(0)'
            },


            // 'colvis', 'pageLength',

            {
                extend: 'excel'
                , className: 'btn btn-primary btn-sm'
                , exportOptions: {
                    columns: [0, ':visible']
                }
            },

            // {
            //     extend: 'csv',
            //     className: 'btn btn-primary btn-sm',
            //     exportOptions: {
            //         columns: [0, ':visible']
            //     }
            // },
            {
                extend: 'pdf'
                , className: 'btn btn-primary btn-sm'
                , exportOptions: {
                    columns: [0, ':visible']
                }
            },

            {
                extend: 'print'
                , className: 'btn btn-primary btn-sm'
                , exportOptions: {
                    columns: [0, ':visible']
                }
            },

            // 'pageLength', 'colvis',
            // 'copy', 'csv', 'excel', 'print'

        ]
    , });

</script>

@endsection
