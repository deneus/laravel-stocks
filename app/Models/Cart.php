<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model cart.
 *
 * @property integer $id
 * @property string $status
 * @property float $total
 */
class Cart extends Model
{
    use HasFactory;

    CONST STATUS_OPEN = 'open';
    CONST STATUS_CLOSE = 'close';

    /**
     * Get the list of products attached to a cart.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function products(): Collection {
        return $this->belongsToMany(Product::class, 'cart_products')->get();
    }

    public static function totalPrice(Cart $cart): float {
        $total = 0;
        foreach ($cart->products() as $product) {
            // @todo Add quantity to cart_products.
            $total += $product->price * 1;
        }
        return $total;
    }

}
