<?php

namespace Tests\Feature;

use App\Http\Controllers\CategoryController;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryPageTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_category_page()
    {

        $category = Category::factory()
            ->count(1)
            ->create();
        $response = $this->get('/category/' . $category->first()->id);

        $response->assertStatus(200);
        $response->assertSeeText(CategoryController::PAGE_TITLE);
    }
}
