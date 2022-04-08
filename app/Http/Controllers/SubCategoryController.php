<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    const PAGE_TITLE = 'Available products';

    public function displaySubCategory(Subcategory $subcategory) {
        $products = Product::all()
            ->where('subcategory_id', $subcategory->id)
            ->where('quantity', '>', 0);

        $productsOutOfStock = Product::all()
            ->where('subcategory_id', $subcategory->id)
            ->where('quantity', 0);

        return view('sub_category', [
            'products' => $products,
            'product_out_of_stock' => $productsOutOfStock,
            'category' => $subcategory->category()[0],
        ]);
    }
}
