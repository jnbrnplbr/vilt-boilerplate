<?php

namespace Tests\Feature\Files;

use App\Models\Files\Gender;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class GenderTest extends TestCase
{

    public function test_gender_lists_page_can_be_rendered()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                            ->get('/files/genders');
        $response->assertStatus(200);
    }

    public function test_create_gender_page_can_be_rendered()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                        ->get(route('genders:create'));
        $response->assertStatus(200);
    }

    public function test_new_gender_can_be_added()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
                        ->postJson('/files/genders', ['description' => 'JustTest']);
        $response->assertStatus(302);
    }

    public function test_selected_gender_can_be_viewed()
    {   
        $user = User::factory()->create();
        $gender = Gender::create(['description' => 'testonly', 'created_by' => $user->id]);
            $response = $this->actingAs($user)
                            ->get(route('genders:show', $gender->id));
            $response->assertStatus(200);
    }

    public function test_gender_edit_page_can_be_rendered()
    {
        $user = User::factory()->create();
        $gender = Gender::create(['description' => 'testonly', 'created_by' => $user->id]);
        $response = $this->actingAs($user)
                           ->call('GET',route('genders:edit',$gender->id),$gender->toArray());
        $response->assertStatus(200);
    }

    public function test_selected_gender_can_be_soft_deleted()
    {
        $user = User::factory()->create();
        $gender = Gender::create(['description' => 'testonly', 'created_by' => $user->id]);
        $response = $this->actingAs($user)
                            ->call('DELETE',route('genders:destroy', $gender->id));
        $response->assertStatus(302);
    }



}
