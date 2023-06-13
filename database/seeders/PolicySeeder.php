<?php

namespace Database\Seeders;

use App\Models\Policy;
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

        Policy::factory()->count(40)->create();

    
    }
}
