<?php

namespace Database\Seeders;

use App\Models\Privacy;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Privacy::create([
            'content' => 'test',
            
           
        ]);
    }
}
