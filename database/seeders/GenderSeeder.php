<?php

namespace Database\Seeders;

use App\Models\Files\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genders = [
            [
                'description'   => 'I prefer not to disclose',
                'created_by'    => 1
            ],
            [
                'description'   => 'Female',
                'created_by'    => 1
            ],
            [
                'description'   => 'Male',
                'created_by'    => 1
            ],
        ];

        foreach($genders as $g)
        {
            Gender::create($g);
        }
        
    }
}
