<section id="best-sellers-area" class="best-selling-products">
    <div class="container mt-4">
        <h2 class="section-title">Best Selling Products</h2>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">

                    <div class="col-lg-3 col-6">
                        <div class="product-box">
                            <!-- Product Badge -->
                            <span class="product-badge">In Stock</span>

                            <!-- Wishlist Icon -->
                            <button class="wishlist-btn">
                                <i class="far fa-heart"></i>
                            </button>

                            <!-- Quick View Button -->
                            <button class="quickview-btn" onclick="openQuickViewMenu()">
                                <i class="fa-regular fa-eye"></i>
                            </button>

                            <div class="product-image">
                                <a href="{{ route('product.details') }}"> <img src="{{ asset('frontend/images/slide2.webp') }}" alt=""> </a>
                                <!-- Plus Button -->
                                <button class="plus-btn" data-bs-toggle="offcanvas" data-bs-target="#cartMenu" aria-controls="cartMenu">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                           
                          
                            @include('frontend/side-menus/quick-view-menu')
                            @include('frontend/side-menus/cart-menu')


                            <div class="product-info d-flex justify-content-around">
                                
                                <div class="product-price">
                                    <p class="product-title">Cotton Printed Kameez</p>
                                    <span class="current-price">৳1,590</span>
                                    <span class="original-price">৳1,990</span>
                                </div>
                                <div class="image-dots">
                                    <span class="dot active" data-image="{{ asset('frontend/images/slide2.webp') }}"></span>
                                    <span class="dot" data-image="{{ asset('frontend/images/kalindi5.webp') }}"></span>
                                    <span class="dot" data-image="{{ asset('frontend/images/kalindi2.webp') }}"></span>
                                </div>
                            </div>

                            <!-- Image Dots -->
                           
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="product-box">
                            <!-- Product Badge -->
                            <span class="product-badge">In Stock</span>

                            <!-- Wishlist Icon -->
                            <button class="wishlist-btn">
                                <i class="far fa-heart"></i>
                            </button>

                            <!-- Quick View Button -->
                            <button class="quickview-btn" onclick="openMenu()">
                                <i class="fa-regular fa-eye"></i>
                            </button>

                            <div class="product-image">
                                <a href="{{ route('product.details') }}"> <img src="{{ asset('frontend/images/slide2.webp') }}" alt=""> </a>
                                <!-- Plus Button -->
                                <button class="plus-btn" data-bs-toggle="offcanvas" data-bs-target="#cartMenu" aria-controls="cartMenu">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            {{-- quick view side menu start --}}
                           


                            <div class="product-info d-flex justify-content-around">
                                
                                <div class="product-price">
                                    <p class="product-title">Cotton Printed Kameez</p>
                                    <span class="current-price">৳1,590</span>
                                    <span class="original-price">৳1,990</span>
                                </div>
                                <div class="image-dots">
                                    <span class="dot active" data-image="{{ asset('frontend/images/slide2.webp') }}"></span>
                                    <span class="dot" data-image="{{ asset('frontend/images/kalindi5.webp') }}"></span>
                                    <span class="dot" data-image="{{ asset('frontend/images/kalindi2.webp') }}"></span>
                                </div>
                            </div>

                            <!-- Image Dots -->
                           
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="product-box">
                            <!-- Product Badge -->
                            <span class="product-badge">In Stock</span>

                            <!-- Wishlist Icon -->
                            <button class="wishlist-btn">
                                <i class="far fa-heart"></i>
                            </button>

                            <!-- Quick View Button -->
                            <button class="quickview-btn" onclick="openQuickViewMenu()">
                                <i class="fa-regular fa-eye"></i>
                            </button>

                            <div class="product-image">
                                <a href="{{ route('product.details') }}"> <img src="{{ asset('frontend/images/slide2.webp') }}" alt=""> </a>
                                <!-- Plus Button -->
                                <button class="plus-btn" onclick="toggleCart()">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            {{-- quick view side menu start --}}
                           



                            <div class="product-info d-flex justify-content-around">
                                
                                <div class="product-price">
                                    <p class="product-title">Cotton Printed Kameez</p>
                                    <span class="current-price">৳1,590</span>
                                    <span class="original-price">৳1,990</span>
                                </div>
                                <div class="image-dots">
                                    <span class="dot active" data-image="{{ asset('frontend/images/slide2.webp') }}"></span>
                                    <span class="dot" data-image="{{ asset('frontend/images/kalindi5.webp') }}"></span>
                                    <span class="dot" data-image="{{ asset('frontend/images/kalindi2.webp') }}"></span>
                                </div>
                            </div>

                            <!-- Image Dots -->
                           
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="product-box">
                            <!-- Product Badge -->
                            <span class="product-badge">In Stock</span>

                            <!-- Wishlist Icon -->
                            <button class="wishlist-btn">
                                <i class="far fa-heart"></i>
                            </button>

                            <!-- Quick View Button -->
                            <button class="quickview-btn" onclick="openQuickViewMenu()">
                                <i class="fa-regular fa-eye"></i>
                            </button>

                            <div class="product-image">
                                <a href="{{ route('product.details') }}"> <img src="{{ asset('frontend/images/slide2.webp') }}" alt=""> </a>
                                <!-- Plus Button -->
                                <button class="plus-btn" onclick="toggleCart()">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                           



                            <div class="product-info d-flex justify-content-around">
                                
                                <div class="product-price">
                                    <p class="product-title">Cotton Printed Kameez</p>
                                    <span class="current-price">৳1,590</span>
                                    <span class="original-price">৳1,990</span>
                                </div>
                                <div class="image-dots">
                                    <span class="dot active" data-image="{{ asset('frontend/images/slide2.webp') }}"></span>
                                    <span class="dot" data-image="{{ asset('frontend/images/kalindi5.webp') }}"></span>
                                    <span class="dot" data-image="{{ asset('frontend/images/kalindi2.webp') }}"></span>
                                </div>
                            </div>

                           
                           
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

