

        
<section id="best-sellers-area" class="best-selling-products">
    <div class="container mt-4">
        <h2 class="section-title">New Arrival Products</h2>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    @foreach($new_arrival as $product)
                    <div class="col-lg-3 col-6">
                        <div class="product-box">
                            <span class="product-badge">
                                {{ $product->variants->first()->stock_quantity ? 'In Stock' : 'Out of stock' }}
                            </span>
                            
                            <button class="wishlist-btn">
                                <i class="far fa-heart"></i>
                            </button>
                        
                            <button class="quickview-btn" onclick="openQuickViewMenu()">
                                <i class="fas fa-eye"></i>
                            </button>
                        
                            <div class="product-image">
                                <a href="{{ route('product.details',$product->id) }}">  <img src="{{ asset('uploads/products/' . $product->product_image) }}" alt="{{ $product->name }}"></a>
                                <button class="plus-btn"onclick="openQuickViewMenu()">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>

                            <?php
                            $discount_type = $product->discount_type;
                            $discount_amount = $product->discount_amount;
                            $sale_price = $product->sale_price;
                            if ($discount_type='flat amount') {
                                $final_price = $sale_price - $discount_amount;
                            }
                            if ($discount_type='percentage'){
                               
                                $final_price =$sale_price-($sale_price/100)*$discount_amount;
                                


                            }


                            
                            ?>
                        
                            <div class="product-info d-flex justify-content-around">
                                <div class="product-price">
                                    <p class="product-title">{{ $product->name }}</p>
                                    <span class="current-price">৳{{$final_price}}
                                    <span class="original-price">৳{{ $product->sale_price }}</span>
                                </div>
                
                                <div class="image-dots">
                                    @foreach($product->galleryImages as $image)
                                    <span class="dot {{ $loop->first ? 'active' : '' }}" data-image="{{ asset('uploads/gallery/' . $image->image) }}"></span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
