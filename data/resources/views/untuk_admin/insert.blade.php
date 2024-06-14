<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My First CRUD</title>
    <link rel="stylesheet" href="{{ asset('style/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
</head>
<body>
@include('layouts.header')

    <div class="container mt-5" style="width: 33%;">
        <form class="mb-4" method="POST" action="/inserting" enctype="multipart/form-data">
          @csrf
          @method('POST')
            <h1 class="text-center mb-4">Insert Product</h1>

            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" id="product_name">
                @error('product_name')<span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" id="price">
                @error('price')<span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="product_pic">Product picture</label>
                <input type="file" class="form-control @error('product_pic') is-invalid @enderror" name="product_pic" id="product_pic">
                @error('product_pic')<span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="desc">Desc</label>
                <textarea name="desc" id="desc"></textarea>
                @error('desc')<span class="text-danger">{{ $message }}</span>@enderror
            </div>

          <button type="submit" id="btn-submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>

<script src="{{ asset('scripts/jquery-3.5.0.min.js') }}"></script>
<script src="{{ asset('scripts/bootstrap.min.js') }}"></script>
</body>
</html>
