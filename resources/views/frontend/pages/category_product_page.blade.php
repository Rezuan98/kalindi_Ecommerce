@extends('frontend.master.master')

@section('keyTitle','Category Products')
@push('ecomcss')
   <style>
.category-header {
    background-color: #f2ebebc2;
    border-bottom: 1px solid #7570705c;
}

.breadcrumb-nav {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    
}

.category-title {
    font-size: 24px;
    font-weight: 600;
    margin: 0;
}

.breadcrumb-path {
    font-size: 14px;
    color: #666;
}

.breadcrumb-path i {
    font-size: 10px;
}

/* end of breadcumb */




/* start price range filter */
.price-filter {
            padding: 0px;
            
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .price-slider-container {
            position: relative;
            padding: 0 10px;
            margin: 20px 0;
        }

        .price-display {
            position: relative;
           
           
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
        }

        .input-container {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 20px;
        }

        .price-input {
            width: 100px;
            border: none;
            background: transparent;
            font-weight: 500;
            color: rgb(47, 46, 45);
            padding: 0;
        }

        .price-input:focus {
            outline: none;
        }

        .price-input::-webkit-inner-spin-button,
        .price-input::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .slider-track {
            height: 4px;
            background: #ddd;
            width: 100%;
            border-radius: 4px;
            position: relative;
        }

        .slider-range {
            height: 100%;
            background: orange;
            border-radius: 4px;
            position: absolute;
        }

        .range-input {
            position: relative;
            height: 30px;
        }

        input[type="range"] {
            -webkit-appearance: none;
            position: absolute;
            width: 100%;
            height: 4px;
            background: none;
            pointer-events: none;
            top: -15px;
        }

        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            height: 18px;
            width: 18px;
            border-radius: 50%;
            background: orange;
            border: 3px solid #fff;
            cursor: pointer;
            pointer-events: auto;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);
        }

        input[type="range"]::-moz-range-thumb {
            height: 18px;
            width: 18px;
            border-radius: 50%;
            background: orange;
            border: 3px solid #fff;
            cursor: pointer;
            pointer-events: auto;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);
        }

        .currency-symbol {
            color: #6c757d;
            font-weight: 500;
        }
        /* end of price range filter */

/* New Color Filter Styles */
.filter-section {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.color-options {
    display: flex; /* Horizontal alignment */
    flex-wrap: wrap; /* Allow wrapping for small screens */
    gap: 5px; /* Space between circles */
    justify-content: flex-start; /* Align items to the left */
}

.color-option {
    display: flex;
    align-items: center;
    gap: 8px; /* Space between the circle and label text */
}

.color-checkbox {
    display: none; /* Hide the checkbox */
}

.color-circle {
    width: 32px;
    height: 32px;
    border-radius: 50%; /* Perfect circle */
    border: 2px solid #fff;
    box-shadow: 0 0 0 1px #ddd;
    display: inline-block;
    cursor: pointer;
}

.color-checkbox:checked + label .color-circle {
    box-shadow: 0 0 0 2px orange; /* Highlight the selected circle */
}

.color-option label {
    cursor: pointer;
    font-weight: normal;
    display: flex;
    align-items: center;
}


/* Size Filter Styles */
.size-options {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.size-option {
    position: relative;
}

.size-checkbox {
    display: none;
}

.size-label {
    display: inline-block;
    width:30px;
    height: 30px;
    line-height: 25px;
    text-align: center;
    border: 1px solid #ddd;
    border-radius: 4px;
    cursor: pointer;
    user-select: none;
    margin: 0;
    transition: all 0.2s;
}

.size-checkbox:checked + .size-label {
    background-color: orange;
    color: white;
    
    border-color: orange;
}

.size-label:hover {
    border-color: orange;
}
    </style> 
@endpush











@section('contents')
@push('ecomjs')

<script>
    const minSlider = document.querySelector('.min-price');
    const maxSlider = document.querySelector('.max-price');
    const minInput = document.querySelector('.min-input');
    const maxInput = document.querySelector('.max-input');
    const range = document.querySelector('.slider-range');

    function updateRange() {
        const min = parseFloat(minSlider.value);
        const max = parseFloat(maxSlider.value);
        const percent1 = (min / minSlider.max) * 100;
        const percent2 = (max / maxSlider.max) * 100;
        
        range.style.left = percent1 + '%';
        range.style.width = (percent2 - percent1) + '%';
        
        minInput.value = min;
        maxInput.value = max;
    }

    function updateSliders() {
        let min = parseFloat(minInput.value);
        let max = parseFloat(maxInput.value);
        
        if (min > max) {
            const temp = min;
            min = max;
            max = temp;
        }
        
        minSlider.value = min;
        maxSlider.value = max;
        updateRange();
    }

    minSlider.addEventListener('input', updateRange);
    maxSlider.addEventListener('input', updateRange);
    minInput.addEventListener('change', updateSliders);
    maxInput.addEventListener('change', updateSliders);

    // Initialize
    updateRange();
</script>
    
@endpush
<!-- Category Header -->
<section class="category-header py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="breadcrumb-nav text-center">
                    {{-- <h5 class="category-title">Category</h5> --}}
                    <div class="breadcrumb-path">
                        <span>Home</span>
                        <i class="fas fa-chevron-right mx-2"></i>
                        <span>Category</span>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>



<!-- Main Content -->
<!-- Category Page -->
<section class="category-page">
    <div class="container">
        <!-- Header with Filters -->
      

        <div class="row">
    <!-- Sidebar -->
    <div class="col-lg-3 ">
        <div class="price-filter">
            <p class="text-muted text-center mt-5">Price Range</p>
            
            <div class="price-display">
                <div class="input-container">
                    <div class="d-flex align-items-center">
                        <span class="currency-symbol me-1">৳</span>
                        <input type="number" class="price-input min-input" value="0" min="0" max="5000">
                    </div>
                    <span class="currency-symbol">-</span>
                    <div class="d-flex align-items-center">
                        <span class="currency-symbol me-1">৳</span>
                        <input type="number" class="price-input max-input" value="5000" min="0" max="5000">
                    </div>
                </div>
                
                <div class="slider-track">
                    <div class="slider-range"></div>
                </div>
                
                <div class="range-input">
                    <input type="range" class="min-price" min="0" max="5000" value="0">
                    <input type="range" class="max-price" min="0" max="5000" value="5000">
                </div>
            </div>
        </div>
        <div class="filter-section mb-2">
            <p class="text-muted text-center mb-1">Select Colors</p>
            <div class="color-options">
                <div class="color-option">
                    <input type="checkbox" id="color-red" class="color-checkbox">
                    <label for="color-red" class="d-flex align-items-center">
                        <span class="color-circle" style="background-color: #FF0000;"></span>
                        
                    </label>
                </div>
                <div class="color-option">
                    <input type="checkbox" id="color-blue" class="color-checkbox">
                    <label for="color-blue" class="d-flex align-items-center">
                        <span class="color-circle" style="background-color: #0000FF;"></span>
                       
                    </label>
                </div>
                <div class="color-option">
                    <input type="checkbox" id="color-green" class="color-checkbox">
                    <label for="color-green" class="d-flex align-items-center">
                        <span class="color-circle" style="background-color: #008000;"></span>
                        
                    </label>
                </div>
                <div class="color-option">
                    <input type="checkbox" id="color-black" class="color-checkbox">
                    <label for="color-black" class="d-flex align-items-center">
                        <span class="color-circle" style="background-color: #000000;"></span>
                       
                    </label>
                </div>
                <div class="color-option">
                    <input type="checkbox" id="color-yellow" class="color-checkbox">
                    <label for="color-yellow" class="d-flex align-items-center">
                        <span class="color-circle" style="background-color: #FFFF00;"></span>
                       
                    </label>
                </div>
                <div class="color-option">
                    <input type="checkbox" id="color-purple" class="color-checkbox">
                    <label for="color-purple" class="d-flex align-items-center">
                        <span class="color-circle" style="background-color: #800080;"></span>
                       
                    </label>
                </div>
                <div class="color-option">
                    <input type="checkbox" id="color-orange" class="color-checkbox">
                    <label for="color-orange" class="d-flex align-items-center">
                        <span class="color-circle" style="background-color: #FFA500;"></span>
                        
                    </label>
                </div>
                <div class="color-option">
                    <input type="checkbox" id="color-green" class="color-checkbox">
                    <label for="color-green" class="d-flex align-items-center">
                        <span class="color-circle" style="background-color: #008000;"></span>
                        
                    </label>
                </div>
                <div class="color-option">
                    <input type="checkbox" id="color-black" class="color-checkbox">
                    <label for="color-black" class="d-flex align-items-center">
                        <span class="color-circle" style="background-color: #000000;"></span>
                       
                    </label>
                </div>
                <div class="color-option">
                    <input type="checkbox" id="color-yellow" class="color-checkbox">
                    <label for="color-yellow" class="d-flex align-items-center">
                        <span class="color-circle" style="background-color: #FFFF00;"></span>
                       
                    </label>
                </div>
                <div class="color-option">
                    <input type="checkbox" id="color-purple" class="color-checkbox">
                    <label for="color-purple" class="d-flex align-items-center">
                        <span class="color-circle" style="background-color: #800080;"></span>
                       
                    </label>
                </div>
                <div class="color-option">
                    <input type="checkbox" id="color-orange" class="color-checkbox">
                    <label for="color-orange" class="d-flex align-items-center">
                        <span class="color-circle" style="background-color: #FFA500;"></span>
                        
                    </label>
                </div>
            </div>
        </div>
        
        

        <div class="filter-section">
            <p class="text-muted text-center mb-1">Select Sizes</p>
            <div class="size-options">
                <div class="size-option">
                    <input type="checkbox" id="size-xs" class="size-checkbox">
                    <label for="size-xs" class="size-label">XS</label>
                </div>
                <div class="size-option">
                    <input type="checkbox" id="size-s" class="size-checkbox">
                    <label for="size-s" class="size-label">S</label>
                </div>
                <div class="size-option">
                    <input type="checkbox" id="size-m" class="size-checkbox">
                    <label for="size-m" class="size-label">M</label>
                </div>
                <div class="size-option">
                    <input type="checkbox" id="size-l" class="size-checkbox">
                    <label for="size-l" class="size-label">L</label>
                </div>
                <div class="size-option">
                    <input type="checkbox" id="size-xl" class="size-checkbox">
                    <label for="size-xl" class="size-label">XL</label>
                </div>
            </div>
        </div>
        
    </div>
    <div class="col-lg-9">
        <div class="row">
            <div class="col-lg-4">
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



















            <div class="col-lg-4">
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
            <div class="col-lg-4">
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
            
        </div>

        
    </div>
</div>




</div>

</div>
    </div>
</section>
@endsection