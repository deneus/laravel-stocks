<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    CONST STATUS_OPEN = 'open';
    CONST STATUS_CLOSE = 'close';
}
