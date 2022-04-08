<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Pivot table cart product.
 *
 * @property int cart_id
 * @property int product_id
 * @property int quantity
 */
class CartProduct extends Model
{
    use HasFactory;
}
