<?php

namespace Database\Seeders;

use App\Models\Box;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BoxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Box::factory()->count(40)->create();
    }
}
