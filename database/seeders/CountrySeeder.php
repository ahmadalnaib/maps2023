<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('countries')->truncate();
        $pages[]= [
           
            'name' => json_encode( ['de' => "Deutschland" , 'en'=>"Germnay"]),
      
           
            ];
            
          
            Country::insert($pages);
    }
}
