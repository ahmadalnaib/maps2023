<?php

namespace Database\Seeders;

use App\Models\Price;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     


        DB::table('prices')->truncate();
        $pages[]= [
           
            'main_title' => json_encode( ['de' => " Die Preise für ein Fach sind Standort und Betreiber abhängig." , 'en'=>"The prices for a locker deppend on the location and operator."]),
            'main_subtitle' => json_encode( ['de' => "Die gültigen Preise finden Sie direkt unter „Ein Fach finden“ am jeweiligen Standort." , 'en'=>"You can find the valid prices directly under 'Find a locker' at the respective location.
            
       "]),
         
           
         
           
            ];
            
          
            Price::insert($pages);
     
    
    }
}
