<?php

namespace Tests\Feature\Utilities;

use App\Models\User;
use App\Models\Utilities\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoleTest extends TestCase
{
    public function test_role_list_page_can_be_rendered(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                            ->get(route('roles:index'));
        $response->assertStatus(200);
    }

    public function test_create_role_page_can_be_rendered()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                        ->get(route('roles:create'));
        $response->assertStatus(200);
    }

    public function test_new_role_can_be_added()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
                        ->postJson(route('roles:store'), [
                            'name'          => 'Super Administrator',
                            'description'   => 'Sudo Power',
                            'code'          => 'SUDO',
                        ]);
        $response->assertStatus(302);
    }

    public function test_selected_role_can_be_viewed()
    {   
        $user = User::factory()->create();
        $role = Role::create([
            'name'          => 'Test Role Only',
            'description'   => 'Test Role Power',
            'code'          => 'TEST',
            'created_by'    => $user->id
        ]);
        $response = $this->actingAs($user)
                    ->get(route('roles:show', $role->id));
        $response->assertStatus(200);
    }

    public function test_role_edit_page_can_be_rendered()
    {
        $user = User::factory()->create();
        $role = Role::create([
            'name'          => 'Test Role Only',
            'description'   => 'Test Role Power',
            'code'          => 'TEST123',
            'created_by'    => $user->id
        ]);
        $response = $this->actingAs($user)
                           ->call('GET',route('roles:edit',$role->id),$role->toArray());
        $response->assertStatus(200);
    }

    public function test_selected_role_can_be_soft_deleted()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
                        ->call('DELETE',route('roles:destroy', 1));
        $response->assertStatus(302);
    }
}
