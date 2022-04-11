<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
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
    /**
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|object|null
     */
    public function category(): Category {
        return $this->belongsTo(Category::class, 'category_id')->first();
    }

    public function products(): Collection {
        return $this->hasMany(Product::class)->get();
    }
}
