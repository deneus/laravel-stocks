<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Provides model Subcategory.
 *
 * @property int $id
 * @property string $label
 * @property string $icon
 * @property int $category_id
 */
class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'icon',
        'category_id',
    ];

    /*
     * Get the subcategory that owns the product.
     */
    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }
}
