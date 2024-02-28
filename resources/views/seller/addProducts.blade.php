@extends('seller.sellerDashboard')
@section('seller-content-page')
    <h1 align=center>Add New Product</h1>
          {{-- error message --}}
          @if (Session::has('error'))
          <p class="text-danger">{{ Session::get('error') }} </p>
      @endif
      {{-- success message --}}
      @if (session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif
    <form action="{{route('products.add') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group col-md-6">
            <label for="name">Product Name:</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{old('name')}}">
            <span class="text-danger">@error('name'){{ $message }} @enderror</span>
        </div>
        <div class="form-group col-md-6">
            <label for="brand">Brand:</label>
            <input type="text" class="form-control" id="brand" name="brand" required value="{{old('brand')}}">
            <span class="text-danger">@error('brand'){{ $message }} @enderror</span>
        </div>
        <div class="form-group col-md-6">
            <label for="category">category:</label>
            <select class="form-select" aria-label="Default select example" name="category">
                <option selected disabled>Select Category</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{$category->category}} </option>
                @endforeach
            </select>
            <span class="text-danger">@error('category'){{ $message }} @enderror</span>
        </div>
        <div class="row g-3">
            <div class="form-group col-md-2">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" required min="0" value="{{old('price')}}">
                <span class="text-danger">@error('price'){{ $message }} @enderror</span>
            </div>
            <div class="form-group col-md-2">
                <label for="quantity">Discount:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required min="0" value="{{old('quantity')}}">
                <span class="text-danger">@error('quantity'){{ $message }} @enderror</span>
            </div>
        </div>
        <div class="form-check-inline">
            <input class="form-check-input" type="radio" name="instock" id="instock_true" value="1" checked>
            <label class="form-check-label" for="instock">
                In Stock
            </label>
        </div>
        <div class="form-check-inline">
            <input class="form-check-input" type="radio" name="instock" id="instock_false" value="0">
            <label class="form-check-label" for="notinstock">
                Not In Stock
            </label>
        </div>
        <div class="form-group col-md-4">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{old('description')}}</textarea>
            <span class="text-danger">@error('description'){{ $message }} @enderror</span>
        </div>
        <div class="form-group col-md-6">
            <label for="image">Product Image:</label>
            <input type="file" class="form-control" aria-label="file example" id="image" name="image"
                accept="image/*" required>
                <span class="text-danger">@error('image'){{ $message }} @enderror</span>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </div>

    </form>
@endsection
