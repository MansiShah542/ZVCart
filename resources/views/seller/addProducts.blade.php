@extends('seller.sellerDashboard')
@section('seller-content-page')
    <h1 align=center>Add New Product</h1>
    <form action="{{route('products.add') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group col-md-6">
            <label for="name">Product Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group col-md-6">
            <label for="name">Brand:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group col-md-6">
            <label for="name">category:</label>
            <select class="form-select" aria-label="Default select example" name="category">
                <option selected disabled>Select Category</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{$category->category}} </option>
                @endforeach
            </select>
        </div>
        <div class="row g-3">
            <div class="form-group col-md-2">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" required>
            </div>
            <div class="form-group col-md-2">
                <label for="quantity">Discount:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>
        </div>
        <div class="form-check-inline">
            <input class="form-check-input" type="radio" name="instock" id="instock" checked>
            <label class="form-check-label" for="instock">
                In Stock
            </label>
        </div>
        <div class="form-check-inline">
            <input class="form-check-input" type="radio" name="fnotinstock" id="notinstock">
            <label class="form-check-label" for="notinstock">
                Not In Stock
            </label>
        </div>
        <div class="form-group col-md-4">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group col-md-6">
            <label for="image">Product Image:</label>
            <input type="file" class="form-control" aria-label="file example" id="image" name="image"
                accept="image/*" required>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </div>

    </form>
@endsection
