<?php

namespace Tests\Feature\Files;

use App\Models\Files\BloodType;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BloodTypeTest extends TestCase
{

    public function test_blood_type_list_page_can_be_rendered(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                            ->get(route('blood_types:index'));
        $response->assertStatus(200);
    }

    public function test_create_blood_type_page_can_be_rendered()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                        ->get(route('blood_types:create'));
        $response->assertStatus(200);
    }

    public function test_new_blood_type_can_be_added()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
                        ->postJson(route('blood_types:store'), [
                            'description'   => 'JustTest',
                            'slug'          => 'JUSTTEST',
                        ]);
        $response->assertStatus(302);
    }

    public function test_selected_blood_type_can_be_viewed()
    {   
        $user = User::factory()->create();
        $blood_type = BloodType::create([
            'description'   => 'testonly', 
            'slug'          => 'testonly',
            'created_by'    => $user->id
        ]);
        $response = $this->actingAs($user)
                    ->get(route('blood_types:show', $blood_type->id));
        $response->assertStatus(200);
    }

    public function test_blood_type_edit_page_can_be_rendered()
    {
        $user = User::factory()->create();
        $blood_type = BloodType::create([
            'description'   => 'testonly', 
            'slug'          => 'testonly',
            'created_by'    => $user->id
        ]);
        $response = $this->actingAs($user)
                           ->call('GET',route('blood_types:edit',$blood_type->id),$blood_type->toArray());
        $response->assertStatus(200);
    }

    public function test_selected_blood_type_can_be_soft_deleted()
    {
        $user = User::factory()->create();
        $blood_type = BloodType::create([
            'description'   => 'testonly', 
            'slug'          => 'testonly',
            'created_by'    => $user->id
        ]);
        $response = $this->actingAs($user)
                        ->call('DELETE',route('blood_types:destroy', $blood_type->id));
        $response->assertStatus(302);
    }
}
