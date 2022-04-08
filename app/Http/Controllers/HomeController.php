<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    const PAGE_TITLE = 'Available categories';

    public function displayHome() {
        $categories = Category::all();
        return view('home', [
            'categories' => $categories,
            'cart' => CartController::getCurrentCart(),
        ]);
    }

}
