<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminSubCategoryRequest;
use App\Models\Category;
use App\Models\Subcategory;

class AdminSubCategoryController extends Controller
{
    /**
     * Redirect to category index page.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    private static function returnToSubCategoryIndex() {
        return redirect(route('sub_categories.index' , ['sub_categories' => Subcategory::all()]));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.sub_category.index', [
            'sub_categories' => Subcategory::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.sub_category.create', ['sub_category' => new SubCategory()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\AdminSubCategoryRequest $request
     *
     * @return \Illuminate\Contracts\Foundation\Application
     */
    public function store(AdminSubCategoryRequest $request)
    {
        SubCategory::factory()
            ->create([
                'icon' => $request->get('icon'),
                'label' => $request->get('label'),
                'category_id' => $request->get('category_id'),
            ]);
        return self::returnToSubCategoryIndex();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Subcategory $subCategory
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Subcategory $subCategory)
    {
        return view('admin.sub_category.edit', ['sub_category' => $subCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\AdminSubCategoryRequest $request
     * @param \App\Models\Subcategory $subCategory
     *
     * @return \Illuminate\Contracts\Foundation\Application
     */
    public function update(AdminSubCategoryRequest $request, Subcategory $subCategory)
    {
        $subCategory->label = $request->get('label');
        $subCategory->icon = $request->get('icon');
        $subCategory->category_id = $request->get('category_id');
        $subCategory->save();

        return self::returnToSubCategoryIndex();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Subcategory $subCategory
     *
     * @return \Illuminate\Contracts\Foundation\Application
     */
    public function destroy(Subcategory $subCategory)
    {
        /** @var \App\Models\Subcategory $subCategories */
        $products = $subCategory->products();

        foreach ($products as $product) {
            $product->delete();
        }

        $subCategory->delete();
        return self::returnToSubCategoryIndex();
    }
}
