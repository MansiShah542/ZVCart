@extends('seller.sloginlayout')
@section('seller-title')
<h2> Seller Login Page</h2>
@endsection
@section('seller-form')
<form action="{{ route('seller.login') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Company Name</label>
        <input type="text" class="form-control" placeholder="Company Name" name="name">
        <span class="text-danger">
            @error('adminName')
                {{ $message }}
            @enderror
        </span>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="text-danger">
            @error('adminPassword')
                {{ $message }}
            @enderror
        </span>
    </div>
    <button type="submit" class="btn btn-gradient">Login</button>
    <div class="d-flex align-items-center justify-content-center pb-4">
        <p class="mb-0 me-2">New Seller?</p>
        <a href="{{route('seller.register.view')}}" class="btn btn-outline-danger">Register</a>
    </div>
</form>
@endsection
