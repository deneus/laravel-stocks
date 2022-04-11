<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminHomeTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_adminHomePage()
    {

        $response = $this->get(route('home'));
        $response->assertStatus(302);

        User::factory()
            ->create([
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin'),
            ]);

        $admin = Auth::loginUsingId(1);
        $this->actingAs($admin);

        $response = $this->get(route('home'));
        $response->assertStatus(200);
    }
}
