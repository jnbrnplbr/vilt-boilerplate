<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class UserTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;
    
    /** @test */
    public function test_user_lists_page_can_be_rendered()
    {
        $this->withoutMiddleware();
        $response = $this->get('/utilities/users');
        $response->assertStatus(200);

    }

    public function test_create_user_page_can_be_rendered()
    {
        $this->withoutMiddleware();
        $response = $this->get('/utilities/users');
        $response->assertStatus(200);

    }


}
