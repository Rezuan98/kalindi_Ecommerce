

        
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
                                <i class="fa-regular fa-eye"></i>
                            </button>
                        
                            <div class="product-image">
                                <a href="{{ route('product.details') }}">     <img src="{{ asset('frontend/images/slide2.webp') }}" alt=""> </a>
                                <!-- Plus Button -->
                                <button class="plus-btn" onclick="openMenu()">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            {{-- quick view side menu start --}}
                            <div id="quickview-menu" class="side-menu">
                               
                                <div class="quickview-content">
                                    <div class="quickview-header">
                                        <h6>Quick View</h6>
                                        <button class="close-btn" onclick="closeMenu('quickview-menu')">
                                            <i class="fa-solid fa-chevron-right"></i>
                                        </button>
                                    </div>
                                    
                                    <div class="quickview-body">
                                        <div class="row g-4">
                                            <!-- Product Images -->
                                            <div class="col-lg-6">
                                                <div class="product-images">
                                                    <div class="main-image">
                                                        <img src="{{ asset('frontend/images/kalindi5.webp') }}" alt="Product">
                                                    </div>
                                                    <div class="image-dots">
                                                        <span class="dot active" data-image="{{ asset('frontend/images/products/p1.webp') }}"></span>
                                                        <span class="dot" data-image="{{ asset('frontend/images/products/p2.webp') }}"></span>
                                                        <span class="dot" data-image="{{ asset('frontend/images/products/p3.webp') }}"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Product Info -->
                                            <div class="col-lg-6">
                                                <div class="product-info">
                                                    <h4 class="product-menu-title">Product Name Goes Here</h4>
                                                    <div class="product-price">
                                                        <span class="current-price">৳1,590</span>
                                                        <span class="original-price">৳1,990</span>
                                                    </div>
                                                    <div class="short-description">
                                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit vitae quaerat iusto autem eius, aspernatur eligendi, ab animi unde tempora laborum dolorem eum veritatis dicta reiciendis ex facilis fugiat! Mollitia tempora consectetur explicabo ullam cupiditate numquam asperiores exercitationem commodi soluta cum, aut possimus ducimus expedita recusandae delectus, ipsa </p>
                                                    </div>
                                                    <!-- Size Selection -->
                                                    <div class="size-selection mt-4">
                                                        <h6>Size</h6>
                                                        <div class="size-options">
                                                            <button class="size-btn">S</button>
                                                            <button class="size-btn">M</button>
                                                            <button class="size-btn">L</button>
                                                            <button class="size-btn">XL</button>
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- Add to Cart Section -->
                                                    <div class="cart-actions mt-4">
                                                        <div class="quantity-wrapper">
                                                            <button class="qty-btn minus">-</button>
                                                            <input type="number" value="1" class="qty-input">
                                                            <button class="qty-btn plus">+</button>
                                                        </div>
                                                        
                                                    </div>
                                                    <button class="add-to-cart-btn p-3">Add to Cart</button>
                                                    <button style="border-radius:5px;" class="buy-now-btn p-3 m-2">Buy Now</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            


                            {{-- <div id="cart-sidebar" class="cart-sidebar">
                                <div class="cart-header">
                                    <h2>Shopping Cart</h2>
                                    <button class="close-btn" onclick="toggleCart()">×</button>
                                </div>
                                
                            </div> --}}
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
                                <button onclick="openMenu()" class="plus-btn">
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
