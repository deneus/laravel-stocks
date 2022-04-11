<?php

namespace Tests\Feature;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubCategoryPageTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_sub_category_page()
    {
        $this->createCategory();
        $sub_category = $this->createSubCategory();

        $response = $this->get('/subcategory/' . $sub_category->category_id);

        $response->assertStatus(200);
        $response->assertSeeText(SubCategoryController::PAGE_TITLE);
    }
}
