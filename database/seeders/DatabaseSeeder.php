<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'email'     => 'jpebora@up.edu.ph',
            'password'  => Hash::make('password'),
            'prefix'    => 'Mr.',
            'suffix'    => '',
            'first_name' => 'Brye',
            'middle_name'   => 'Plata',
            'last_name'     => 'Ebora',
            'contact'       => '09056677255',
            'birthday'      => now(),
            'blood_type_id' => 1,
            'gender_id'     => 1,
            'role_id'       => 1,
            'created_by'    => 1
        ]);

        $this->call([
            GenderSeeder::class,
            BloodTypeSeeder::class,
            RoleSeeder::class
        ]);
    }
}
