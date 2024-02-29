@extends('seller.sellerDashboard')
@section('seller-content-page')
    <h1 align=center>Products</h1>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach ($products as $product)
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="card-img-top">
                    <hr>
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }} </h5>
                        <p class="card-text">{{ $product->description }}
                            <br> Brand: {{ $product->brand }}
                           <br> Discount: {{ $product->discount }}
                           <br> Price: {{ $product->price }}
                        </p>
                    </div>
                    <div class="card-footer">
                        @if ($product->instock)
                            <span class="badge bg-success">In Stock</span>
                        @else
                            <span class="badge bg-danger">Out Of Stock</span>
                        @endif
                        <form action="{{ route('product.delete', $product->id) }}" method="POST"
                            class="float-end">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
