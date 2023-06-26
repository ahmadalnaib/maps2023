<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('faqs')->truncate();
        $pages[]= [
           
            'question_one' => json_encode( ['de' => "Was ist das für ein Buchungsportal?" , 'en'=>"What´s the reason for this booking plattform"]),
            'answer_one' => json_encode( ['de' => "
            " , 'en'=>""]),

            'question_two' => json_encode( ['de' => "Alle Fächer sind belegt" , 'en'=>"All lockers are booked"]),
            'answer_two' => json_encode( ['de' => "" , 'en'=>""]),

            'question_three' => json_encode( ['de' => "Die Zahlung hat nicht funktioniert" , 'en'=>"Payment doesn´t work"]),
            'answer_three' => json_encode( ['de' => "" , 'en'=>""]),

            'question_four' => json_encode( ['de' => "Code vergessen" , 'en'=>"Forgot my personal code"]),
            'answer_four' => json_encode( ['de' => "" , 'en'=>""]),
           
            'question_five' => json_encode( ['de' => "RFID-Karte verloren" , 'en'=>"Lose my RFID-card"]),
            'answer_five' => json_encode( ['de' => "" , 'en'=>""]),
           
            'question_six' => json_encode( ['de' => "Fach öffnet nicht" , 'en'=>"Locker does not open "]),
            'answer_six' => json_encode( ['de' => "" , 'en'=>""]),

            'question_seven' => json_encode( ['de' => "Was passiert wenn ich meine Mietdauer überschreite? " , 'en'=>"What happens if I exceed my rental period?"]),
            'answer_seven' => json_encode( ['de' => "" , 'en'=>""]),

            'question_eight' => json_encode( ['de' => "Fehlgeschlagene Registrierung" , 'en'=>"problems with registration"]),
            'answer_eight' => json_encode( ['de' => "" , 'en'=>""]),
           
           
           
           
         
           
            ];
            
          
            Faq::insert($pages);
     
    }
    
}
