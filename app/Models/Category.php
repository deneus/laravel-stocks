<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Provides model Category.
 *
 * @property int $id
 * @property string $label
 * @property string $icon
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'icon',
    ];
}
