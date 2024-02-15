@extends('seller.sloginlayout')
@section('seller-title')
    <h2> Seller Register Page</h2>
@endsection
@section('seller-form')
    <form action="" method="POST" class="sregister">
        @csrf
        <div class="form-group">
            <label>Company Name</label>
            <input type="text" class="form-control" placeholder="Company Name" name="name">
            <span class="text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="abc@company.com" name="email">
            <span class="text-danger">
                @error('email')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label>GST No</label>
            <input type="text" class="form-control" placeholder="123456789AAAAAA" name="gst">
            <span class="text-danger">
                @error('gst')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="phone" class="form-control" placeholder="1234567890" name="phone">
            <span class="text-danger">
                @error('phone')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="address" class="form-control" placeholder="Address" name="address">
            <span class="text-danger">
                @error('address')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <button type="submit" class="btn btn-gradient">Register</button>
    </form>
@endsection
