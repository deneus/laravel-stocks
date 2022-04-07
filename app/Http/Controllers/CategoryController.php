<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    const PAGE_TITLE = 'Available sub-categories';

    /**
     * @param \App\Models\Category $category
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function displayCategory(Category $category) {
        $sub_categories = Subcategory::all()
            ->where('category_id', $category->id);

        return view('category', [
            'sub_categories' => $sub_categories,
        ]);
    }
}
