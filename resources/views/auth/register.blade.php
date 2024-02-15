@extends('auth.loginlayout')
@section('title')
    ZVCart Register
@endsection
@section('formcontent')
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <p>Please login to your account</p>
        <div class="form-outline mb-4">
            <input type="text" name="name" id="form3Example3" class="form-control" value="{{old('name')}}"/>
            <label class="form-label" for="form3Example3">Full Name</label>
            <span class="text-danger">@error('name'){{ $message }} @enderror</span>
        </div>
        
        
        
        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="email" name="email" id="form3Example3" class="form-control" placeholder="email address" value="{{old('email')}}"/>
            <label class="form-label" for="form3Example3">Email address</label>
            <span class="text-danger">@error('email'){{ $message }} @enderror</span>
        </div>
        
        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" name="password" id="form3Example4" class="form-control" value="{{old('password')}}" required autocomplete="new-password"/>
            <label class="form-label" for="form3Example4">Password</label>
            <span class="text-danger">@error('password'){{ $message }} @enderror</span>
          

            {{-- confirm password input --}}
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required autocomplete="new-password"/>
            <label class="form-label" for="form3Example4">Confirm Password</label>
           
        </div>

        <div class="text-center pt-1 mb-5 pb-1">
            <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3">Register</button>
        </div>
        <div class="d-flex align-items-center justify-content-center pb-4">
            <p class="mb-0 me-2">Already Registered?</p>
            <a href="{{route('login.view')}}" class="btn btn-outline-danger">Login</a>
        </div>
    </form>
@endsection
