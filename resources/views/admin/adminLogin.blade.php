<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ZVCart Admin</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/adminlogin.css') }}">
</head>

<body>
    <div class="sidenav admin">
        <div class="login-main-text">
            <h1>ZVCart<br></h1>
            <h2> Admin Login Page</h2>
            <p>Administrating is not an easy job.</p>
        </div>
    </div>
    <div class="main">
        <div class="col-md-6 col-sm-12">
            <div class="login-form">
                {{-- error message --}}
                @if (Session::has('error'))
                    <p class="text-danger">{{ Session::get('error') }} </p>
                @endif


                <form action="{{ route('admin.login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" class="form-control" placeholder="User Name" name="name" value="{{ old('name') }}">
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <button type="submit" class="btn btn-black">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
