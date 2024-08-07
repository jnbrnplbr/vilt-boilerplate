<?php

namespace Database\Seeders;

use App\Models\Utilities\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name'          => 'Super Administrator',
                'description'   => 'Sudo Power',
                'code'          => 'SUDO',
                'created_by'    => 1
            ],
            [
                'name'          => 'Administrator',
                'description'   => 'System Administrator',
                'code'          => 'ADMIN',
                'created_by'    => 1
            ],
            [
                'name'          => 'Assistant',
                'description'   => 'Doctors Assistant',
                'code'          => 'ASSIST',
                'created_by'    => 1
            ],            
            [
                'name'          => 'Doctor',
                'description'   => 'Roles for Doctor',
                'code'          => 'DOCTOR',
                'created_by'    => 1
            ],            
            [
                'name'          => 'Patient',
                'description'   => 'Roles for Patient',
                'code'          => 'PATIENT',
                'created_by'    => 1
            ],
            [
                'name'          => 'Monitoring',
                'description'   => 'System Monitoring',
                'code'          => 'MONITOR',
                'created_by'    => 1
            ],
        ];

        foreach($roles as $role)
        {
            Role::create($role);
        }
    }
}
