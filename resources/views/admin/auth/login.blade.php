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

    <!-- Site Css
        ====================================-->
    <link rel="stylesheet" href="{{ asset('public/admin-assets/css/style.css') }}">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body class="login-wrap">
    <form class="center-height login-form" action="{{ route('admin.auth') }}" method="post">
        {!! csrf_field() !!}
        <div class="col-md-12 col-sm-12">
            <div class="alert alert-success alert-dismissible fade d-none" id="headLogActionSuccess" role="alert">
                Logged in successfully
            </div>
            <div class="alert alert-danger alert-dismissible fade d-none" role="alert" id="headLogActionError">
                Error ! please check your credentials
            </div>
        </div>
        <div class="form-title">
            <i class="fa fa-lock"></i>
            Sign in To Your Account
        </div>
        <div class="form-group">
            <label>Emaill Address </label>
            <input type="text" class="form-control" name="email" placeholder="Email Address">
        </div>
        <div class="form-group">
            <label>Password </label>
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="form-group text-center">
            <button type="submit" class="custom-btn">
                login now
            </button>
        </div>
        <!--End Form cont-->
    </form>
    <!--End Form-->
    <div class="loader">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
    <!-- JS Base And Vendor
        ==========================================-->
    <script src="{{ asset('public/admin-assets/vendor/jquery/jquery.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="{{ asset('public/admin-assets/vendor/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/admin-assets/vendor/datepicker/jquery.datetimepicker.full.min.js') }}"></script>
    <script src="{{ asset('public/admin-assets/vendor/select/select2.min.js') }}"></script>
    <script src="{{ asset('public/admin-assets/vendor/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('public/admin-assets/vendor/count-to/jquery.countTo.js') }}"></script>
    <script src="{{ asset('public/admin-assets/vendor/counterdown/countdown.js') }}"></script>
    <script src="{{ asset('public/admin-assets/js/main.js') }}"></script>

    <!-- authentication validation -->
    <script src="{{ asset('public/admin-assets/js/jquery.validate.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/admin-assets/js/login.js') }}" type="text/javascript"></script>
</body>

</html>
