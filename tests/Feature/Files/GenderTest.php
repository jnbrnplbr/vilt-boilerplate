<?php

namespace Tests\Feature\Files;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GenderTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_gender_lists_page_can_be_rendered()
    {
        $this->withoutMiddleware();
        $response = $this->get('/files/genders');
        $response->assertStatus(200);
    }
}
