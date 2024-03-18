<html lang="en">

<head>
    <!-- Meta Tags
        ======================-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="copyright" content="">

    <!-- Title Name
        ================================-->
    <title>Brandbourne | Cocodada</title>

    <!-- Fave Icons
        ================================-->
    <link rel="shortcut icon" href="{{ asset('public/admin-assets/images/fav-icon.png') }}">

    <!-- Css Base And Vendor
        ===================================-->
    <link rel="stylesheet" href="{{ asset('public/admin-assets/vendor/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('public/admin-assets/vendor/datepicker/jquery.datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin-assets/vendor/select/select-min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin-assets/vendor/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin-assets/vendor/tagsinput/css/tagsinput.css') }}">

    <!-- Site Css
        ====================================-->
    <link rel="stylesheet" href="{{ asset('public/admin-assets/css/style.css') }}">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
    <div class="modal fade" id="form-messages" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header custom-modal">
                    <h5 class="modal-title" id="exampleModalLabel">Notes</h5>
                </div>
                <div class="modal-body">
                    <div class="response-messages">

                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('models')
    @include('admin.layouts.sidebar')
    <!-- Main
        ==========================================-->
    <div class="main">
        @include('admin.layouts.header')

        @yield('content')
    </div>
    <!--End Main-->
    <div class="loader">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
    <!-- JS Base And Vendor
        ==========================================-->
    <script src="{{ asset('public/admin-assets/vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('public/admin-assets/js/jquery.form.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="{{ asset('public/admin-assets/vendor/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/admin-assets/vendor/datepicker/jquery.datetimepicker.full.min.js') }}"></script>
    <script src="{{ asset('public/admin-assets/vendor/select/select2.min.js') }}"></script>
    <script src="{{ asset('public/admin-assets/vendor/tagsinput/js/tagsinput.js') }}"></script>
    <script src="{{ asset('public/admin-assets/vendor/datatable/datatables.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script src="{{ asset('public/admin-assets/vendor/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('public/admin-assets/vendor/count-to/jquery.countTo.js') }}"></script>
    <script src="{{ asset('public/admin-assets/vendor/counterdown/countdown.js') }}"></script>
    <script src="{{ asset('public/admin-assets/js/main.js') }}"></script>
    <script src="{{ asset('public/admin-assets/js/admin.js') }}"></script>
    @yield('js')
</body>

</html>
