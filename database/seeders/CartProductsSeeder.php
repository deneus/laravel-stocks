<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CartProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $carts = Cart::all();
        foreach ($carts as $cart) {
            for ($i=0; $i<rand(1, 6); $i++) {
                $product = Product::all()
                    ->shuffle()
                    ->first();
                CartProduct::factory()
                    ->create([
                        'cart_id' => $cart->id,
                        'product_id' => $product->id,
                        'quantity' => rand(0,5),
                ]);
            }
        }
    }
}
