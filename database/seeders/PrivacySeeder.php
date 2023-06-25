<?php

namespace Database\Seeders;

use App\Models\Privacy;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PrivacySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('faqs')->truncate();
        $pages[]= [
           
            'content' => json_encode( ['de' => "Was ist das für ein Buchungsportal?" , 'en'=>"What´s the reason for this booking plattform"]),
    
           
            ];
            
          
            Privacy::insert($pages);
     
    
    }
}
