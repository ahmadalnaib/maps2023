<?php

namespace Database\Seeders;

use App\Models\BoxType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BoxTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        BoxType::factory()->count(40)->create();
    }
}
