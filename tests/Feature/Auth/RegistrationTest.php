<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register()
    {
        $response = $this->post('/register', [
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'prefix'    => 'Mr.',
            'suffix'    => '',
            'first_name' => 'Brye',
            'middle_name'   => 'Plata',
            'last_name'     => 'Ebora',
            'contact'       => '09056677255',
            'birthday'      => now(),
            'blood_type'    => 1,
            'gender'        => 1,
            'role'          => 1,
            'created_by'    => 1
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
