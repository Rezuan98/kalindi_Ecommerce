<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductVarient;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{

    public function viewCart()
    {
        if (Auth::check()) {
            // For authenticated users - get from database
            $cartItems = Cart::with([
                'product',
                'variant.color',
                'variant.size'
            ])->where('user_id', Auth::id())
              ->get();
            
            $cartCount = $cartItems->sum('quantity');
        } else {
            // For guests - get from session
            $sessionCart = session('cart', []);
            
            $cartItems = collect($sessionCart)->map(function ($item, $key) {
                $product = Product::find($item['product_id']);
                $variant = ProductVarient::with(['color', 'size'])->find($item['varient_id']);
                
                return (object)[
                    'id' => $key,
                    'product' => $product,
                    'variant' => $variant,
                    'quantity' => $item['quantity'],
                    'price' => $item['price']
                ];
            });
            
            $cartCount = $cartItems->sum('quantity');
        }
    
       
    
        return view('frontend.pages.cart', compact(
            'cartItems', 
            'cartCount', 
            
        ));
    }
    // public function viewCart()
    // {
    //     if (Auth::check()) {
    //         // For authenticated users - get from database
    //         $cartItems = Cart::with([
    //             'product',
    //             'variant',
    //             'variant.color',
    //             'variant.size'
    //         ])->where('user_id', Auth::id())
    //           ->get();
            
    //         $cartCount = $cartItems->sum('quantity');
    //     } else {
    //         // For guests - get from session
    //         $sessionCart = session('cart', []);
    //         $cartItems = collect($sessionCart)->map(function ($item, $key) {
    //             $product = Product::find($item['product_id']);
    //             $variant = ProductVarient::with(['color', 'size'])->find($item['varient_id']);
                
    //             return (object)[
    //                 'id' => $key,
    //                 'product' => $product,
    //                 'variant' => $variant,
    //                 'quantity' => $item['quantity'],
    //                 'price' => $item['price']
    //             ];
    //         });
            
    //         $cartCount = $cartItems->sum('quantity');
    //     }
    //     dd($cartItems );
    
    //     return view('frontend.pages.cart', compact('cartItems', 'cartCount'));
    // }

    public function addToCart(Request $request)
    {
        try {
            $validated = $request->validate([
                'product_id' => 'required|exists:products,id',
                'varient_id' => 'required|exists:product_varients,id',
                'quantity' => 'required|integer|min:1',
                'price' => 'required|numeric'
            ]);

            if (Auth::check()) {
                // For authenticated users - store in database
                $cartItem = Cart::where([
                    'user_id' => Auth::id(),
                    'product_id' => $request->product_id,
                    'varient_id' => $request->varient_id,
                ])->first();

                if ($cartItem) {
                    // Update quantity if item exists
                    $cartItem->quantity += $request->quantity;
                    $cartItem->save();
                } else {
                    // Create new cart item
                    Cart::create([
                        'user_id' => Auth::id(),
                        'product_id' => $request->product_id,
                        'varient_id' => $request->varient_id,
                        'quantity' => $request->quantity,
                        'price' => $request->price
                    ]);
                }

                $cartCount = Cart::where('user_id', Auth::id())->sum('quantity');
            } else {
                // For unauthenticated users - store in session
                $cart = session()->get('cart', []);
                
                $itemKey = $request->product_id . '-' . $request->varient_id;
                
                if (isset($cart[$itemKey])) {
                    // Update quantity if item exists
                    $cart[$itemKey]['quantity'] += $request->quantity;
                } else {
                    // Add new item
                    $cart[$itemKey] = [
                        'product_id' => $request->product_id,
                        'varient_id' => $request->varient_id,
                        'quantity' => $request->quantity,
                        'price' => $request->price
                    ];
                }
                
                session()->put('cart', $cart);
                
                $cartCount = collect($cart)->sum('quantity');
            }

            return response()->json([
                'success' => true,
                'message' => 'Product added to cart successfully',
                'cartCount' => $cartCount
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add product to cart: ' . $e->getMessage()
            ], 500);
        }
    }







//     public function viewCart()
// {
//     if (Auth::check()) {
//         // For authenticated users - get from database
//         $cartItems = Cart::with(['product', 'variant'])
//             ->where('user_id', Auth::id())
//             ->get();
//         $cartCount = $cartItems->sum('quantity');
//     } else {
//         // For guests - get from session
//         $sessionCart = session('cart', []);
//         $cartItems = collect($sessionCart)->map(function ($item, $key) {
//             // Get product and variant details
//             $product = Product::find($item['product_id']);
//             $variant = ProductVariant::find($item['varient_id']);
            
//             return (object)[
//                 'id' => $key,
//                 'product' => $product,
//                 'variant' => $variant,
//                 'quantity' => $item['quantity'],
//                 'price' => $item['price']
//             ];
//         });
//         $cartCount = $cartItems->sum('quantity');
//     }
// dd($cartCount);
//     return view('frontend.pages.cart', compact('cartItems', 'cartCount'));
// }

    
    




   

}
