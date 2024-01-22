<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('front/css/main.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <title>Create Product</title>
</head>
<body>
    <div class="section-container form-container">
        <a href="{{ route('product.index') }}" class="back-button">
            <i class="fas fa-arrow-left fa-lg"></i>
        </a>
        <h2>Create a New Product</h2>

        <form method="POST" action="{{ route('product.store') }}">
            @csrf

            <div class="form-group">
                <label for="name" class="form-label">Name:</label>
                <input type="text" id="name" name="name" class="form-control" >
                @error('name')
                <span class="error">{{ $message }}</span>
            @enderror
            </div>

            <div class="form-group">
                <label for="price" class="form-label">Price:</label>
                <input type="number" id="price" name="price" class="form-control" >
                @error('price')
                <span class="error">{{ $message }}</span>
            @enderror
            </div>

            <div class="form-group">
                <label for="quantity" class="form-label">Quantity:</label>
                <input type="number" id="quantity" name="quantity" class="form-control" >
                @error('quantity')
                <span class="error">{{ $message }}</span>
            @enderror
            </div>

            <div class="form-group">
                <label for="description" class="form-label">Description:</label>
                <textarea id="description" name="description" class="form-control" rows="4"></textarea>
                @error('description')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="category-container">
                <div class="category-title">Product Categories:</div>
                <div class="category-checkboxes">
                    @foreach ($categories as $category)
                        <label class="checkbox-container">
                            <input type="checkbox" name="categories[]" value="{{ $category->id }}">
                            <span class="checkmark"></span>
                            {{ $category->name }}
                        </label>
                    @endforeach
                </div>

                @error('categories')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <br>

            <button type="submit" class="btn btn-primary">Create Product</button>
        </form>
    </div>
</body>
</html>
