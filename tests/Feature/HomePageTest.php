<?php

namespace Tests\Feature;

use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomePageTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_home_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSeeText(HomeController::PAGE_TITLE);
    }
}
