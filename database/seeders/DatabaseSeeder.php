<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\BoxSeeder;
use Database\Seeders\FaqSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\PlanSeeder;
use Database\Seeders\TermSeeder;
use Database\Seeders\PlaceSeeder;
use Database\Seeders\PriceSeeder;
use Database\Seeders\PolicySeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\HowsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call(PlaceSeeder::class);
        $this->call(BoxSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(FaqSeeder::class);
        $this->call(HowsTableSeeder::class);
        $this->call(PlaceSeeder::class);
        $this->call(PlanSeeder::class);
        $this->call(PriceSeeder::class);
        $this->call(TermSeeder::class);
        $this->call(PolicySeeder::class);
    }
}
