@extends('frontend.master.master')

@section('keyTitle','Product Details')

@section('contents')

<div  class="breadcrumb-wrap py-3 border-bottom">
    <div style="margin-left:60px;" class="breadcrumb-container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/category">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">BORNI</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container mt-2">
    <!-- Product Section -->
    <div class="row">
        <!-- Product Images -->
        <div class="col-lg-6">
            <div class="product-images">
                <!-- Main Image -->

                
                <div class="main-image mb-3">
                    <div class="zoom-container">
            <img src="{{ asset('frontend/images/kalindi2.webp') }}" alt="Product Name" class="img-fluid">
        </div>      
        </div>
                <!-- Thumbnail Images -->
                <div class="thumbnails d-flex gap-2">
                    <img src="{{ asset('frontend/images/kalindi2.webp') }}" alt="Thumbnail 1" class="img-thumbnail cursor-pointer">
                    <img src="{{ asset('frontend/images/kalindi5.webp') }}" alt="Thumbnail 2" class="img-thumbnail cursor-pointer">
                    <img src="{{ asset('frontend/images/kalindi2.webp') }}" alt="Thumbnail 3" class="img-thumbnail cursor-pointer">
                </div>
            </div>
        </div>

        <!-- Product Info -->
        <div class="col-lg-6">
            <div class="product-info">
                <h1 class="product-details-title mb-3">BORNI</h1>
                <div class="product-price mb-4">
                    <span class="current-price h3">৳3,690.00</span>
                </div>

                <!-- Color Selection -->
                <div class="color-selection mb-4">
                    <h6 class="mb-2">COLOR</h6>
                    <div class="color-options d-flex gap-2">
                        <div class="color-option active" style="background-color: #000000;"></div>
                        <div class="color-option" style="background-color: #FF0000;"></div>
                    </div>
                </div>

                <!-- Size Selection -->
                <div class="size-selection mb-4">
                    <h6 class="mb-2">SIZE</h6>
                    <div class="size-options d-flex gap-2">
                        <button class="size-btn">S</button>
                        <button class="size-btn active">M</button>
                        <button class="size-btn">L</button>
                        <button class="size-btn">XL</button>
                    </div>
                </div>

                <!-- Quantity -->
                <div class="quantity-section mb-4">
                    <h6 class="mb-2">QUANTITY</h6>
                    <div class="quantity-selector d-flex align-items-center gap-3">
                        <button class="qty-btn" onclick="decrementQty()">-</button>
                        <input type="number" id="quantity" value="1" min="1" class="form-control text-center" style="width: 60px;">
                        <button class="qty-btn" onclick="incrementQty()">+</button>
                    </div>
                </div>

                <!-- Add to Cart Button -->
                <button class="btn btn-dark w-100 mb-3">ADD TO CART</button>

                <!-- Additional Actions -->
                <button class="btn btn-outline-dark w-100 mb-4">ADD TO WISHLIST</button>

                <!-- Product Description -->
                <div class="product-description mb-4">
                    <h6 class="mb-2">DESCRIPTION</h6>
                    <p>Semi Fitted Long Top with Beautiful Embroidery</p>
                </div>

                <!-- Product Details -->
                <div class="product-details">
                    <h6 class="mb-2">DETAILS</h6>
                    <ul class="list-unstyled">
                        <li>• Fabric: Cotton</li>
                        <li>• Fit Type: Regular Fit</li>
                        <li>• Wash Care: Machine Wash</li>
                        <li>• Length: 45 inches</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection