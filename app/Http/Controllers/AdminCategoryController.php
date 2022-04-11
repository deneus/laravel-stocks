<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminCategoryRequest;
use App\Models\Category;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.category.index', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.category.create', ['category' => new Category()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\AdminCategoryRequest $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function store(AdminCategoryRequest $request)
    {
        Category::factory()
            ->create([
                'icon' => $request->get('icon'),
                'label' => $request->get('label'),
            ]);
        return self::returnToCategoryIndex();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Category $category
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\AdminCategoryRequest $request
     * @param \App\Models\Category $category
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function update(AdminCategoryRequest $request, Category $category)
    {
        $category->label = $request->get('label');
        $category->icon = $request->get('icon');
        $category->save();

        return self::returnToCategoryIndex();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function destroy(Category $category)
    {
        /** @var \App\Models\Subcategory $subCategories */
        $subCategories = $category->subCategories();

        foreach ($subCategories as $subCategory) {
            foreach ($subCategory->products() as $product) {
                $product->delete();
            }
            $subCategory->delete();
        }

        $category->delete();
        return self::returnToCategoryIndex();
    }

    private static function returnToCategoryIndex() {
        return redirect(route('categories.index' , ['categories' => Category::all()]));
    }
}
