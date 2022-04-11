<?php

namespace Tests;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function beAdmin(): void {
        Session::start();
        User::factory()
            ->create([
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin'),
            ]);

        $admin = Auth::loginUsingId(1);
        $this->actingAs($admin);
    }

    protected function createCategory(): Category {
        return Category::factory()
            ->count(1)
            ->create()
            ->first();
    }

    protected function createSubCategory(): Subcategory {
        $this->createCategory();
        return Subcategory::factory()
            ->count(1)
            ->create()
            ->first();
    }
}
