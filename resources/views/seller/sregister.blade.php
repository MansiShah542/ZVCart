@extends('seller.sloginlayout')
@section('seller-title')
    <h2> Seller Register Page</h2>
@endsection
@section('seller-form')
    <form action="{{route('seller.register')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Company Name</label>
            <input type="text" class="form-control" placeholder="Company Name" name="company_name" value="{{ old('company_name') }}">
            <span class="text-danger">
                @error('company_name')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label>GST No</label>
            <input type="text" class="form-control" placeholder="123456789AAAAAA" name="gst_no" value="{{ old('gst_no') }}">
            <span class="text-danger">
                @error('gst_no')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="phone" class="form-control" placeholder="1234567890" name="phone" value="{{ old('phone') }}">
            <span class="text-danger">
                @error('phone')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="address" class="form-control" placeholder="Address" name="address" value="{{ old('address') }}">
            <span class="text-danger">
                @error('address')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="abc@company.com" name="email" value="{{ old('email') }}">
            <span class="text-danger">
                @error('email')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" value="{{ old('password') }}">
            <span class="text-danger">
                @error('password')
                {{ $message }}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
            <span class="text-danger">
                @error('password_confirmation')
                    {{ $message }}
                @enderror
        </div>
        <button type="submit" class="btn btn-gradient">Register</button>
        <div class="d-flex align-items-center justify-content-center pb-4">
            <p class="mb-0 me-2">Already Registered?</p>
            <a href="{{ route('seller.login.view') }}" class="btn btn-outline-danger">Login</a>
        </div>
    </form>
@endsection
