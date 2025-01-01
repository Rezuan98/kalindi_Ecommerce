@extends('frontend.master.master')

@section('contents')
<div class="container">
    <!-- Cart Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold cart-num-count">
            Shopping Cart ({{ $cartCount }} {{ Str::plural('item', $cartCount) }})
        </h2>
        <a href="{{ route('home') }}" class="btn btn-outline-primary">
            Continue Shopping
        </a>
    </div>

    <!-- Cart Content -->
    <div class="row g-4">
        <!-- Cart Items -->
        <div class="col-lg-8">
            @if($cartItems->count() > 0)
                @foreach($cartItems as $item)
                <div class="card shadow-sm mb-3 cart-item">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-2">
                                <img src="{{ asset('uploads/products/' . $item->product->product_image) }}" 
                                     alt="{{ $item->product->name }}" 
                                     class="img-fluid rounded">
                            </div>
                           
                            <div class="col-4">
                                <h6>{{ $item->product->product_name }}</h6>
                                <p class="text-muted mb-0">
                                    Size: {{ $item->variant && $item->variant->size ? $item->variant->size->name : 'Not Available' }}
                                </p>
                                <p class="text-muted">
                                    Color: {{ $item->variant && $item->variant->color ? $item->variant->color->name : 'Not Available' }}
                                </p>
                                <h6 class="mb-0 item-price">৳{{ number_format($item->price, 2) }}</h6>
                            </div>
                            <div class="col-3">
                                <div class="input-group">
                                    <button class="btn btn-outline-secondary decrease-qty" type="button" 
                                            onclick="updateQuantity('{{ $item->id }}', 'decrease')">-</button>
                                    <input type="number" class="form-control text-center quantity-input" 
                                           value="{{ $item->quantity }}" min="1" max="10" 
                                           data-item-id="{{ $item->id }}">
                                    <button class="btn btn-outline-secondary increase-qty" type="button"
                                            onclick="updateQuantity('{{ $item->id }}', 'increase')">+</button>
                                </div>
                            </div>
                            <div class="col-1">
                                <button class="btn text-danger remove-item" 
                                        onclick="removeItem('{{ $item->id }}')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <!-- Empty Cart Message -->
                <div class="empty-cart-message text-center py-5">
                    <i class="fas fa-shopping-cart fa-3x mb-3 text-muted"></i>
                    <h3 class="text-muted">Your cart is empty</h3>
                    <p class="text-muted mb-4">Looks like you haven't added any items to your cart yet.</p>
                    <a href="{{ route('home') }}" class="btn btn-primary">Continue Shopping</a>
                </div>
            @endif
        </div>

        <!-- Order Summary -->
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-4">Order Summary</h4>
                    
                    <!-- Price Details -->
                    <div class="mb-4">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal</span>
                            <span class="cart-subtotal">৳{{ number_format($cartItems->sum(function($item) {
                                return $item->price * $item->quantity;
                            }), 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Shipping</span>
                            <span class="cart-shipping">৳{{ $cartItems->count() > 0 ? number_format(10.00, 2) : '0.00' }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Tax (10%)</span>
                            <span class="cart-tax">৳{{ number_format($cartItems->sum(function($item) {
                                return ($item->price * $item->quantity) * 0.1;
                            }), 2) }}</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-2">
                            <strong>Total</strong>
                            <strong class="cart-total">৳{{ number_format(
                                $cartItems->sum(function($item) {
                                    return ($item->price * $item->quantity) * 1.1;
                                }) + ($cartItems->count() > 0 ? 10 : 0)
                            , 2) }}</strong>
                        </div>
                    </div>

                    @if($cartItems->count() > 0)
                        <button class="btn btn-primary w-100 mb-3 checkout-btn">
                            Proceed to Checkout
                        </button>
                    @endif
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
async function updateQuantity(itemId, action) {
    const input = document.querySelector(`input[data-item-id="${itemId}"]`);
    const currentValue = parseInt(input.value);
    let newValue = currentValue;

    if (action === 'increase' && currentValue < 10) {
        newValue = currentValue + 1;
    } else if (action === 'decrease' && currentValue > 1) {
        newValue = currentValue - 1;
    }

    if (newValue !== currentValue) {
        try {
            const response = await fetch('/cart/update', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    item_id: itemId,
                    quantity: newValue
                })
            });

            const data = await response.json();
            
            if (data.success) {
                input.value = newValue;
                updateCartTotal();
                updateCartCounts(data.cartCount);
            }
        } catch (error) {
            console.error('Error updating quantity:', error);
        }
    }
}

async function removeItem(itemId) {
    if (confirm('Are you sure you want to remove this item?')) {
        try {
            const response = await fetch('/cart/remove', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    item_id: itemId
                })
            });

            const data = await response.json();
            
            if (data.success) {
                const cartItem = document.querySelector(`input[data-item-id="${itemId}"]`).closest('.cart-item');
                cartItem.style.opacity = '0';
                setTimeout(() => {
                    cartItem.remove();
                    updateCartTotal();
                    updateCartCounts(data.cartCount);
                    checkEmptyCart();
                }, 300);
            }
        } catch (error) {
            console.error('Error removing item:', error);
        }
    }
}

// Keep your existing JavaScript code for updateCartTotal, etc.
</script>
@endpush