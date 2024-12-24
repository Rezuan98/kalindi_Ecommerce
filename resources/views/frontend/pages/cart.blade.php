@extends('frontend.master.master')

@section('contents')
<div class="container ">
    <!-- Cart Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold cart-num-count">Shopping Cart (3 items)</h2>
        <a href="#" class="btn btn-outline-primary">
            Continue Shopping
        </a>
    </div>

    <!-- Cart Content -->
    <div class="row g-4">
        <!-- Cart Items -->
        <div class="col-lg-8">
            <!-- Cart Item 1 -->
            <div class="card shadow-sm mb-3 cart-item">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-2">
                            <img src="{{ asset('frontend/images/kalindi2.webp') }}" alt="Product" class="img-fluid rounded">
                        </div>
                        <div class="col-4">
                            <h6>Nike Sport Shoes</h6>
                            <p class="text-muted mb-0">Size: 42</p>
                            <p class="text-muted">Color: Black</p>
                            <h6 class="mb-0 item-price">$89.99</h6>
                        </div>
                        <div class="col-3">
                            <div class="input-group">
                                <button class="btn btn-outline-secondary decrease-qty" type="button">-</button>
                                <input type="number" class="form-control text-center quantity-input" value="1" min="1" max="10">
                                <button class="btn btn-outline-secondary increase-qty" type="button">+</button>
                            </div>
                        </div>
                       
                        <div class="col-1">
                            <button class="btn text-danger remove-item">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cart Item 2 -->
            <div class="card shadow-sm mb-3 cart-item">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <img src="{{ asset('frontend/images/kalindi2.webp') }}" alt="Product" class="img-fluid rounded">
                        </div>
                        <div class="col-md-4">
                            <h5>Leather Wallet</h5>
                            <p class="text-muted mb-0">Size: 42</p>
                            <p class="text-muted mb-0">Color: Brown</p>
                            <h6 class="mb-0 item-price">$45.00</h6>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <button class="btn btn-outline-secondary decrease-qty" type="button">-</button>
                                <input type="number" class="form-control text-center quantity-input" value="1" min="1" max="10">
                                <button class="btn btn-outline-secondary increase-qty" type="button">+</button>
                            </div>
                        </div>
                        
                        <div class="col-md-1">
                            <button class="btn text-danger remove-item">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Empty Cart Message -->
            <div class="empty-cart-message text-center py-5 d-none">
                <i class="fas fa-shopping-cart fa-3x mb-3 text-muted"></i>
                <h3 class="text-muted">Your cart is empty</h3>
                <p class="text-muted mb-4">Looks like you haven't added any items to your cart yet.</p>
                <a href="#" class="btn btn-primary">Continue Shopping</a>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-4">Order Summary</h4>
                    
                    <!-- Coupon -->
                    <div class="mb-4">
                        <div class="input-group">
                            <input type="text" class="form-control coupon-input" placeholder="Enter coupon code">
                            <button class="btn btn-outline-primary apply-coupon">Apply</button>
                        </div>
                        <div class="coupon-message text-success mt-2 d-none"></div>
                    </div>

                    <!-- Price Details -->
                    <div class="mb-4">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal</span>
                            <span class="cart-subtotal">$134.99</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Shipping</span>
                            <span class="cart-shipping">$10.00</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Tax</span>
                            <span class="cart-tax">$13.50</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2 discount-row d-none">
                            <span class="text-success">Discount</span>
                            <span class="cart-discount text-success">-$0.00</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-2">
                            <strong>Total</strong>
                            <strong class="cart-total">$158.49</strong>
                        </div>
                    </div>

                    <button class="btn btn-primary w-100 mb-3 checkout-btn">
                        Proceed to Checkout
                    </button>

                    <!-- Payment Methods -->
                    <div class="text-center mt-3">
                        <p class="text-muted mb-2">We Accept:</p>
                        <div class="payment-icons">
                            <i class="fab fa-cc-visa mx-1"></i>
                            <i class="fab fa-cc-mastercard mx-1"></i>
                            <i class="fab fa-cc-amex mx-1"></i>
                            <i class="fab fa-cc-paypal mx-1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('ecomcss')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    .card {
        border: none;
        border-radius: 10px;
        transition: all 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-2px);
    }

    .quantity-input {
        max-width: 70px;
    }

    .payment-icons i {
        font-size: 24px;
        color: #6c757d;
        margin: 0 5px;
    }

    .btn-outline-secondary:hover {
        background-color: #f8f9fa;
    }

    .input-group {
        flex-wrap: nowrap;
    }

    .img-fluid {
        object-fit: cover;
        height: 100px;
        width: 100px;
    }

    @media (max-width: 768px) {
        .row > * {
            margin-bottom: 1rem;
        }

        .img-fluid {
        object-fit: cover;
        height: 60px;
        width: 60px;
    }
    }

    .loading {
        opacity: 0.5;
        pointer-events: none;
    }
</style>
@endpush

@push('ecomjs')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get all necessary elements
    const increaseButtons = document.querySelectorAll('.increase-qty');
    const decreaseButtons = document.querySelectorAll('.decrease-qty');
    const quantityInputs = document.querySelectorAll('.quantity-input');
    const removeButtons = document.querySelectorAll('.remove-item');
    const applyButton = document.querySelector('.apply-coupon');
    const couponInput = document.querySelector('.coupon-input');
    const checkoutBtn = document.querySelector('.checkout-btn');

    // Add event listeners to increase buttons
    increaseButtons.forEach(button => {
        button.addEventListener('click', function() {
            const input = this.parentElement.querySelector('.quantity-input');
            const currentValue = parseInt(input.value);
            const max = parseInt(input.getAttribute('max'));
            
            if (currentValue < max) {
                input.value = currentValue + 1;
                updateCartTotal();
            }
        });
    });

    // Add event listeners to decrease buttons
    decreaseButtons.forEach(button => {
        button.addEventListener('click', function() {
            const input = this.parentElement.querySelector('.quantity-input');
            const currentValue = parseInt(input.value);
            const min = parseInt(input.getAttribute('min'));
            
            if (currentValue > min) {
                input.value = currentValue - 1;
                updateCartTotal();
            }
        });
    });

    // Add event listeners to quantity inputs
    quantityInputs.forEach(input => {
        input.addEventListener('change', function() {
            const min = parseInt(this.getAttribute('min'));
            const max = parseInt(this.getAttribute('max'));
            const value = parseInt(this.value);

            if (value < min) this.value = min;
            if (value > max) this.value = max;

            updateCartTotal();
        });
    });

    // Add event listeners to remove buttons
    removeButtons.forEach(button => {
        button.addEventListener('click', function() {
            if (confirm('Are you sure you want to remove this item?')) {
                const cartItem = this.closest('.cart-item');
                cartItem.style.opacity = '0';
                setTimeout(() => {
                    cartItem.remove();
                    updateCartTotal();
                    updateTotalItems();
                    checkEmptyCart();
                }, 300);
            }
        });
    });

    // Apply coupon
    if (applyButton) {
        applyButton.addEventListener('click', function() {
            const couponCode = couponInput.value.trim();
            
            if (couponCode) {
                this.classList.add('loading');
                this.disabled = true;
                
                setTimeout(() => {
                    const couponMessage = document.querySelector('.coupon-message');
                    const discountRow = document.querySelector('.discount-row');
                    
                    if (couponCode.toLowerCase() === 'discount20') {
                        couponMessage.textContent = 'Coupon applied successfully! 20% off';
                        couponMessage.classList.remove('d-none', 'text-danger');
                        couponMessage.classList.add('text-success');
                        discountRow.classList.remove('d-none');
                        updateCartTotal(0.2);
                    } else {
                        couponMessage.textContent = 'Invalid coupon code';
                        couponMessage.classList.remove('d-none', 'text-success');
                        couponMessage.classList.add('text-danger');
                    }
                    
                    this.classList.remove('loading');
                    this.disabled = false;
                }, 1000);
            }
        });
    }

    // Checkout button
    if (checkoutBtn) {
        checkoutBtn.addEventListener('click', function() {
            this.classList.add('loading');
            this.disabled = true;
            
            setTimeout(() => {
                alert('Proceeding to checkout...');
                this.classList.remove('loading');
                this.disabled = false;
            }, 1000);
        });
    }

    // Helper Functions
    function updateTotalItems() {
        const itemCount = document.querySelectorAll('.cart-item').length;
        document.querySelector('.cart-num-count').textContent = `Shopping Cart (${itemCount} items)`;
    }

    function checkEmptyCart() {
        const cartItems = document.querySelectorAll('.cart-item');
        const emptyMessage = document.querySelector('.empty-cart-message');
        
        if (cartItems.length === 0) {
            emptyMessage.classList.remove('d-none');
        } else {
            emptyMessage.classList.add('d-none');
        }
    }

    function updateCartTotal(discount = 0) {
        let subtotal = 0;
        const cartItems = document.querySelectorAll('.cart-item');
        
        cartItems.forEach(item => {
            const price = parseFloat(item.querySelector('.item-price').textContent.replace('$', ''));
            const quantity = parseInt(item.querySelector('.quantity-input').value);
            subtotal += price * quantity;
        });

        // Update subtotal
        document.querySelector('.cart-subtotal').textContent = `$${subtotal.toFixed(2)}`;
        
        // Calculate discount
        const discountAmount = subtotal * discount;
        if (discount > 0) {
            document.querySelector('.cart-discount').textContent = `-$${discountAmount.toFixed(2)}`;
        }
        
        // Calculate tax (10%)
        const tax = (subtotal - discountAmount) * 0.1;
        document.querySelector('.cart-tax').textContent = `$${tax.toFixed(2)}`;
        
        // Shipping is fixed at $10 if cart has items
        const shipping = subtotal > 0 ? 10 : 0;
        document.querySelector('.cart-shipping').textContent = `$${shipping.toFixed(2)}`;
        
        // Calculate final total
        const finalTotal = subtotal - discountAmount + tax + shipping;
        document.querySelector('.cart-total').textContent = `$${finalTotal.toFixed(2)}`;
    }

    // Initialize
    updateCartTotal();
    updateTotalItems();
    checkEmptyCart();
});
</script>
@endpush