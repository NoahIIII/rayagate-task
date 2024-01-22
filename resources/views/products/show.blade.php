<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('front/css/main.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Product Details</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 20px;
        }


        .section-container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            width: 80%; /* Adjust the width to cover more space */
        }

        .product-details {
            max-width: 100%; /* Make the product details take the full width of its container */
            margin: auto;
            padding: 40px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            position: relative;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .product-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        .product-info {
            margin-bottom: 15px;
        }

        .product-label {
            font-weight: bold;
            color: #333;
        }

        .product-value {
            color: #666;
        }
    </style>
</head>
<body>
    <div class="section-container">
        <div class="product-details">
            <a href="{{ route('product.index') }}" class="back-button">
                <i class="fas fa-arrow-left fa-lg"></i>
            </a>

            <h2 class="product-title">Product Details</h2>

            <div class="product-info">
                <span class="product-label">Name:</span>
                <span class="product-value">{{ $product->name }}</span>
            </div>

            <div class="product-info">
                <span class="product-label">Price:</span>
                <span class="product-value">${{ $product->price }}</span>
            </div>

            <div class="product-info">
                <span class="product-label">Quantity:</span>
                <span class="product-value">{{ $product->quantity }}</span>
            </div>
            @if($product->categories->isNotEmpty())
            <div class="product-info">
                <span class="product-label">Categories:</span>
                <span class="product-value">
                    @foreach($product->categories as $category)
                        {{ $category->name }}
                        @if(!$loop->last) <!-- Add a comma if it's not the last category -->
                            ,
                        @endif
                    @endforeach
                </span>
            </div>
        @endif
            @if($product->description != null)
            <div class="product-info">
                <span class="product-label">Description:</span>
                <span class="product-value">{{ $product->description }}</span>
            </div>
            @endif
        </div>
    </div>
</body>
</html>
