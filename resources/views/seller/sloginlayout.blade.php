<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ZVCart Seller</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/adminlogin.css') }}">
</head>

<body>
    <div class="sidenav seller">
        <div class="login-main-text">
            <h1>ZVCart<br></h1>
            @yield('seller-title')
            <h5>We are the Sellers.</h5>
        </div>
    </div>
    <div class="main">
        <div class="col-md-6 col-sm-12">
            <div class="login-form">
                {{-- error message --}}
                @if (Session::has('error'))
                    <p class="text-danger">{{ Session::get('error') }} </p>
                @endif
                {{-- success message --}}
                @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

                    @yield('seller-form')
               
            </div>
        </div>
    </div>
</body>

</html>
