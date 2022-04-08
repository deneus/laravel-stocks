<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function displayCart() {
        return view('iframe.cart', ['cart' => self::getCurrentCart()]);
    }

    /**
     * Get current cart.
     *
     * @return mixed
     */
    public static function getCurrentCart() {
        return Cart::all()
            ->where('status', 'open')
            ->last();
    }

    /**
     * Get total price.
     *
     * @return float
     */
    public static function totalPrice(): float {
        return Cart::totalPrice(self::getCurrentCart());
    }

    /**
     * Process add to cart post.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public static function addToCart(Request $request) {
        $cart = self::getCurrentCart();
        $product = self::getSubmittedProduct($request);

        self::storeCartProduct($cart, $product);
        self::updateProductQuantity($product);

        return redirect(route('sub_category', ['subcategory' => $product->subcategory_id]));
    }

    /**
     * @param \App\Models\Cart $cart
     * @param \App\Models\Product $product
     *
     * @return void
     */
    private static function storeCartProduct(Cart $cart, Product $product) {
        CartProduct::factory()
            ->create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \App\Models\Product
     */
    private static function getSubmittedProduct(Request $request): Product {
        /** @var \stdClass $product */
        $stdClass = json_decode($request->get('item'));
        return Product::all()
            ->where('id', $stdClass->id)
            ->first();
    }

    /**
     * Update product quantity in stock.
     *
     * @param \App\Models\Product $product
     * @param int $quantity
     *
     * @return void
     */
    private static function updateProductQuantity(Product $product, int $quantity = 1) {
        $product->quantity = $product->quantity - $quantity;
        if ($product->quantity < 0) {
            $product->quantity = 0;
        }
        $product->save();
    }

}
