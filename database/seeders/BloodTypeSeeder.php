<?php

namespace Database\Seeders;

use App\Models\Files\BloodType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BloodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blood_types = [
            [
                'description'   => 'A positive',
                'slug'          => 'A+',
                'created_by'    => 1
            ],
            [
                'description'   => 'A negative',
                'slug'          => 'A-',
                'created_by'    => 1
            ],
            [
                'description'   => 'B positive',
                'slug'          => 'B+',
                'created_by'    => 1
            ],
            [
                'description'   => 'B negative',
                'slug'          => 'B-',
                'created_by'    => 1
            ],
            [
                'description'   => 'AB positive',
                'slug'          => 'AB+',
                'created_by'    => 1
            ],
            [
                'description'   => 'AB negative',
                'slug'          => 'AB-',
                'created_by'    => 1
            ],
            [
                'description'   => 'O positive',
                'slug'          => 'O+',
                'created_by'    => 1
            ],
            [
                'description'   => 'O negative',
                'slug'          => 'O-',
                'created_by'    => 1
            ],

        ];

        foreach($blood_types as $t)
        {
            BloodType::create($t);
        }
    }
}
