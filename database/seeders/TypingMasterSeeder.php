<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TypingMaster;

class TypingMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypingMaster::create([
            'name' => 'Rabia Atique',
            'gender' => 'female',
            'designation' => 'Lead Developer',
            'wpm' => 115,
            'accuracy' => 98
        ]);

        TypingMaster::create([
            'name' => 'Romaisa Habib',
            'gender' => 'female',
            'designation' => 'Laravel Developer',
            'wpm' => 108,
            'accuracy' => 99
        ]);
        
        TypingMaster::create([
            'name' => 'Taha Khan',
            'gender' => 'male',
            'designation' => 'Project Manager',
            'wpm' => 102,
            'accuracy' => 97
        ]);

        TypingMaster::create([
            'name' => 'Shahzaib Ali',
            'gender' => 'male',
            'designation' => 'Senior HR',
            'wpm' => 98,
            'accuracy' => 95
        ]);

        TypingMaster::create([
            'name' => 'Muhammad Talal',
            'gender' => 'male',
            'designation' => 'DevOps Engineer',
            'wpm' => 95,
            'accuracy' => 96
        ]);
    }
}