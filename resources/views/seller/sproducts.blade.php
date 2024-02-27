@extends('seller.sellerDashboard')
@section('seller-content-page')
    <h1 align=center>Products Page</h1>
    <a href="{{route('products.add.view') }}" class="btn btn-success btn-sm mb-3">Add New Product</a>
@endsection