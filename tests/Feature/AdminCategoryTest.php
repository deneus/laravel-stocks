<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AdminCategoryTest extends TestCase
{

    use DatabaseMigrations;

    public function test_middleware()
    {
        $response = $this->get(route('categories.index'));
        $response->assertStatus(302);

    }

    public function test_index()
    {
        $this->beAdmin();
        $response = $this->get(route('categories.index'));
        $response->assertStatus(200);
    }

    public function test_create()
    {
        $this->beAdmin();
        $response = $this->get(route('categories.create'));
        $response->assertStatus(200);
    }

    public function test_store()
    {
        $this->beAdmin();
        $response = $this->post(route('categories.store'),[
            '_token' => csrf_token(),
            'icon' => 'fa-solid fa-bomb',
            'label' => 'valid test',
        ]);
        $this->assertEquals(302, $response->getStatusCode());

        $categories = Category::all();
        $this->assertCount(1, $categories);
    }

    public function test_edit()
    {
        $this->beAdmin();
        $category = $this->createCategory();

        $response = $this->get(route('categories.edit', ['category' => $category->id]));
        $response->assertStatus(200);
    }

    public function test_update()
    {
        $this->beAdmin();
        $category = $this->createCategory();

        $value = 'valid test';
        $response = $this->put(route('categories.update', ['category' => $category->id]),[
            '_token' => csrf_token(),
            'icon' => $category->icon,
            'label' => $value,
        ]);

        $response->assertStatus(302);

        $category = Category::all()->last();
        $this->assertEquals($value, $category->label);
    }

    public function test_delete()
    {
        $this->beAdmin();
        $category = $this->createCategory();

        $response = $this->delete(route('categories.update', ['category' => $category->id]),[
            '_token' => csrf_token(),
        ]);
        $response->assertStatus(302);

        $categories = Category::all();
        $this->assertCount(0, $categories);
    }
}
