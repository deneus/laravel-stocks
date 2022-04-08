<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Model product
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property int $quantity
 * @property float $price
 * @property string $path
 * @property int $subacategory_id
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'quantity',
        'price',
        'path',
        'subcategory_id',
    ];

    /*
     * Get the subcategory that owns the product.
     */
    public function subcategory(): BelongsTo {
        return $this->belongsTo(Subcategory::class);
    }
}
