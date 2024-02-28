@extends('admin.adminDashboard')
@section('content-page')
    <style>
        #addbtn:hover {
            background-color: rgb(35, 33, 33) !important;
            /* Use !important to override Bootstrap styles */
            color: white;
            /* Optionally change text color to white */
        }
    </style>
    <div class="container">
        <h3 align="center">Product Categories</h3>
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
        <form action="{{ route('categories.add') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group col-md-6 mb-3">
                        <input type="text" class="form-control" name="category" placeholder="Add Category"
                            aria-label="Add Category" aria-describedby="addbtn">
                        <button class="btn btn-outline-secondary" type="submit" id="addbtn">Add</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-md-6">
                <h5>All Categories</h5>
                <ul class="list-group">
                    @foreach ($categories as $category)
                        <div>
                            <li class="list-group-item">{{ $category->category }}
                                <form action="{{ route('category.delete', $category->id) }}" method="POST"
                                    class="float-end">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </li>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
