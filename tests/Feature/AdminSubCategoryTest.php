<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AdminSubCategoryTest extends TestCase
{

    use DatabaseMigrations;

    public function test_middleware()
    {
        $response = $this->get(route('sub_categories.index'));
        $response->assertStatus(302);

    }

    public function test_index()
    {
        $this->beAdmin();
        $response = $this->get(route('sub_categories.index'));
        $response->assertStatus(200);
    }

    public function test_create()
    {
        $this->beAdmin();
        $response = $this->get(route('sub_categories.create'));
        $response->assertStatus(200);
    }

    public function test_store()
    {
        $this->beAdmin();
        $category = $this->createCategory();
        $response = $this->post(route('sub_categories.store'),[
            '_token' => csrf_token(),
            'icon' => 'fa-solid fa-bomb',
            'label' => 'valid test',
            'category_id' => $category->id,
        ]);
        $this->assertEquals(302, $response->getStatusCode());

        $categories = SubCategory::all();
        $this->assertCount(1, $categories);
    }

    public function test_edit()
    {
        $this->beAdmin();
        $sub_category = $this->createSubCategory();
//dd($sub_category);
        $response = $this->get(route('sub_categories.edit', ['sub_category' => $sub_category->id]));
        $response->assertStatus(200);
    }

    public function test_update()
    {
        $this->beAdmin();
        $sub_category = $this->createSubCategory();

        $value = 'valid test';
        $response = $this->put(route('sub_categories.update', ['sub_category' => $sub_category->id]),[
            '_token' => csrf_token(),
            'icon' => $sub_category->icon,
            'category_id' => $sub_category->id,
            'label' => $value,
        ]);

        $response->assertStatus(302);

        $sub_category = SubCategory::all()->last();
        $this->assertEquals($value, $sub_category->label);
    }

    public function test_delete()
    {
        $this->beAdmin();
        $sub_category = $this->createSubCategory();

        $response = $this->delete(route('sub_categories.destroy', ['sub_category' => $sub_category]),[
            '_token' => csrf_token(),
        ]);
        $response->assertStatus(302);

        $sub_categories = Subcategory::all();
        $this->assertCount(0, $sub_categories);
    }
}
