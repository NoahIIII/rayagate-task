<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('front/css/main.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Products</title>
</head>

<body>
    @if (!isset($message))
        <div class="section-container">
            <a href="{{ route('product.create') }}" class="create-product-button">
                <i class="fas fa-plus"></i> Create
            </a>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-3">
                        <div class="card-container">
                            <a href="{{ route('product.show', $product->id) }}" class="card-link">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="card-title">{{ $product->name }}</h2>
                                        <p class="card-text">Price: ${{ $product->price }}</p>
                                        <p class="card-text">Quantity: {{ $product->quantity }}</p>
                                        <!-- Display Product Description -->
                                        @if ($product->description != null)
                                            <p class="card-text"> Description: {{ $product->description }}</p>
                                        @endif
                                        @if ($product->categories->isNotEmpty())
                                            <p class="card-text"><strong>Categories:</strong>
                                                @foreach ($product->categories as $category)
                                                    {{ $category->name }}
                                                    @if (!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
                {{ $products->links() }}
            </div>

        </div>
    @endif
    @if (isset($message))
        <div class="empty-message-container">
            <div class="empty-message-box">
                <p class="empty-message">{{ $message }}</p>
            </div>
        </div>
    @endif
</body>

</html>
