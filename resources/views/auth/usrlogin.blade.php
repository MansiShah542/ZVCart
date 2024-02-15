
@extends('auth.loginlayout')
@section('title')
ZVCart Login
@endsection
@section('formcontent')
    <form action="{{ route('login') }}" method="POST">
      @csrf
        <p>Please login to your account</p>

        <div class="form-outline mb-4">
            <input type="email" name="email" id="form2Example11" class="form-control" placeholder="email address" />
            <label class="form-label" for="form2Example11">Username</label>
            <span class="text-danger">@error('email'){{ $message }} @enderror</span>
        </div>

        <div class="form-outline mb-4">
            <input type="password" name="password" id="form2Example22" class="form-control" />
            <label class="form-label" for="form2Example22">Password</label>
            <span class="text-danger">@error('password'){{ $message }} @enderror</span>
        </div>

        <div class="text-center pt-1 mb-5 pb-1">
            <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3">Login</button>
            <a class="text-muted" href="#!">Forgot password?</a>
        </div>


        <div class="d-flex align-items-center justify-content-center pb-4">
            <p class="mb-0 me-2">Don't have an account?</p>
            <a href="{{route('register.view')}}" class="btn btn-outline-danger">Create new</a>
        </div>
        <div class="d-flex align-items-center justify-content-center pb-4">
          <a href="#" class="btn btn-outline-danger">Login as a Seller</a>
        </div>
    </form>
@endsection
