<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>eTrade</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('user/assets/images/favicon.png') }}">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('user/assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/vendor/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/vendor/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/vendor/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/vendor/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/vendor/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/vendor/sal.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/vendor/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/vendor/base.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/style.min.css') }}">

</head>


<body class="sticky-header newsletter-popup-modal">
    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    @include('user.partials.header')

    <main class="main-wrapper">

        @yield('content')

    </main>
    <!-- Start Footer Area  -->
    @include('user.partials.footer')
    <!-- End Footer Area  -->
    <div class="closeMask"></div>
    <!-- Offer Modal End -->
    <!-- JS
============================================ -->
    <!-- Modernizer JS -->
    <script src="{{ asset('user/assets/js/vendor/modernizr.min.js') }}"></script>
    <!-- jQuery JS -->
    <script src="{{ asset('user/assets/js/vendor/jquery.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('user/assets/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/js.cookie.js') }}"></script>
    <!-- <script src="assets/js/vendor/jquery.style.switcher.js"></script> -->
    <script src="{{ asset('user/assets/js/vendor/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/jquery.ui.touch-punch.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/sal.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/conterup.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/waypoints.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Main JS -->
    <script src="{{ asset('user/assets/js/main.js') }}"></script>

    @yield('script')

    @if(Session::get('login'))
    <script>
        Swal.fire({
            title: 'Berhasil!'
            , text: 'Anda Berhasil Login'
            , icon: 'success'
            , confirmButtonText: 'Ok'
        })

    </script>
    @endif

    @if(Session::get('loginerror'))
    <script>
        Swal.fire({
            title: 'Gagal!'
            , text: 'Email atau Password Salah'
            , icon: 'error'
            , confirmButtonText: 'Ok'
        })

    </script>
    @endif

    @if(Session::get('register'))
    <script>
        Swal.fire({
            title: 'Berhasil!'
            , text: 'Anda Berhasil Register'
            , icon: 'success'
            , confirmButtonText: 'Ok'
        })

    </script>
    @endif

    @if(Session::get('updateprofil'))
    <script>
        Swal.fire({
            title: 'Berhasil!'
            , text: 'Profil Berhasil Diupdate'
            , icon: 'success'
            , confirmButtonText: 'Ok'
        })

    </script>
    @endif

    @if(Session::get('logout'))
    <script>
        Swal.fire({
            title: 'Berhasil!'
            , text: 'Anda Berhasil Logout'
            , icon: 'success'
            , confirmButtonText: 'Ok'
        })

    </script>
    @endif

    @if(Session::get('storecart'))
    <script>
        swal.fire({
            title: 'Berhasil!'
            , text: 'Produk Berhasil Ditambahkan Ke Keranjang'
            , icon: 'success'
            , confirmButtonText: 'Ok'
        })

    </script>
    @endif


    @if(Session::get('updatecart'))
    <script>
        swal.fire({
            title: 'Berhasil!'
            , text: 'Keranjang Berhasil Diupdate'
            , icon: 'success'
            , confirmButtonText: 'Ok'
        })

    </script>
    @endif

    @if(Session::get('deletecart'))
    <script>
        swal.fire({
            title: 'Berhasil!'
            , text: 'Produk Berhasil Dihapus Dari Keranjang'
            , icon: 'success'
            , confirmButtonText: 'Ok'
        })

    </script>
    @endif

    @if(Session::get('kosongcart'))
    <script>
        swal.fire({
            title: 'Gagal!'
            , text: 'Keranjang Masih Kosong'
            , icon: 'error'
            , confirmButtonText: 'Ok'
        })

    </script>
    @endif

    @if(Session::get('logindulu'))
    <script>
        swal.fire({
            title: 'Gagal!'
            , text: 'Silahkan Login Terlebih Dahulu'
            , icon: 'error'
            , confirmButtonText: 'Ok'
        })

    </script>
    @endif

    @if(Session::get('stoktidakcukup'))
    <script>
        // swal("Gagal!", "{{ Session::get('stoktidakcukup') }}", "error");
        swal.fire({
            title: 'Gagal!'
            , text: '{{ Session::get('
            stoktidakcukup ') }}'
            , icon: 'error'
            , confirmButtonText: 'Ok'
        })

    </script>
    @endif

</body>
</html>
