

        
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
                            <button class="quickview-btn" onclick="openMenu()">
                                <i class="fas fa-eye"></i>
                            </button>
                        
                            <div class="product-image">
                                <a href="{{ route('product.details') }}">     <img src="{{ asset('frontend/images/slide2.webp') }}" alt=""> </a>
                                <!-- Plus Button -->
                                <button class="plus-btn">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <div id="quickview-menu" class="side-menu">
                                <button class="close-btn" onclick="closeMenu('quickview-menu')">&times;</button>
                                <h3>Quick View</h3>
                                <p>Product details or quick view content goes here.</p>
                            </div>
                            


                            <div id="cart-sidebar" class="cart-sidebar">
                                <div class="cart-header">
                                    <h2>Shopping Cart</h2>
                                    <button class="close-btn" onclick="toggleCart()">×</button>
                                </div>
                                <div class="cart-items">
                                    <p>Your cart is empty</p>
                                </div>
                            </div>
                            <div class="product-info">
                                <p class="product-title">Cotton Printed Kameez</p>
                                <div class="product-price">
                                    <span class="current-price">৳1,590</span>
                                    <span class="original-price">৳1,990</span>
                                </div>
                            </div>
                        
                            <!-- Image Dots -->
                            <div class="image-dots">
                                <span class="dot active" data-image="{{ asset('frontend/images/slide2.webp') }}"></span>
                                <span class="dot" data-image="{{ asset('frontend/images/kalindi5.webp') }}"></span>
                                <span class="dot" data-image="{{ asset('frontend/images/kalindi2.webp') }}"></span>
                            </div>
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
                                <i class="fas fa-eye"></i>
                            </button>
                        
                            <div class="product-image">
                              <a href="{{ route('product.details') }}">  <img src="{{ asset('frontend/images/slide2.webp') }}" alt=""></a>
                                <!-- Plus Button -->
                                <button class="plus-btn">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        
                            <div class="product-info">
                                <p class="product-title">Cotton Printed Kameez</p>
                                <div class="product-price">
                                    <span class="current-price">৳1,590</span>
                                    <span class="original-price">৳1,990</span>
                                </div>
                            </div>
                        
                            <!-- Image Dots -->
                            <div class="image-dots">
                                <span class="dot active" data-image="{{ asset('frontend/images/slide2.webp') }}"></span>
                                <span class="dot" data-image="{{ asset('frontend/images/kalindi.webp') }}"></span>
                                <span class="dot" data-image="{{ asset('frontend/images/kalindi2.webp') }}"></span>
                            </div>
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
                                <i class="fas fa-eye"></i>
                            </button>
                        
                            <div class="product-image">
                                <img src="{{ asset('frontend/images/slide2.webp') }}" alt="">
                                <!-- Plus Button -->
                                <button class="plus-btn">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        
                            <div class="product-info">
                                <p class="product-title">Cotton Printed Kameez</p>
                                <div class="product-price">
                                    <span class="current-price">৳1,590</span>
                                    <span class="original-price">৳1,990</span>
                                </div>
                            </div>
                        
                            <!-- Image Dots -->
                            <div class="image-dots">
                                <span class="dot active" data-image="{{ asset('frontend/images/slide2.webp') }}"></span>
                                <span class="dot" data-image="{{ asset('frontend/images/kalindi.webp') }}"></span>
                                <span class="dot" data-image="{{ asset('frontend/images/kalindi2.webp') }}"></span>
                            </div>
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
                                <i class="fas fa-eye"></i>
                            </button>
                        
                            <div class="product-image">
                                <img src="{{ asset('frontend/images/slide2.webp') }}" alt="">
                                <!-- Plus Button -->
                                <button class="plus-btn">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        
                            <div class="product-info">
                                <p class="product-title">Cotton Printed Kameez</p>
                                <div class="product-price">
                                    <span class="current-price">৳1,590</span>
                                    <span class="original-price">৳1,990</span>
                                </div>
                            </div>
                        
                            <!-- Image Dots -->
                            <div class="image-dots">
                                <span class="dot active" data-image="{{ asset('frontend/images/slide2.webp') }}"></span>
                                <span class="dot" data-image="{{ asset('frontend/images/kalindi.webp') }}"></span>
                                <span class="dot" data-image="{{ asset('frontend/images/kalindi2.webp') }}"></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
