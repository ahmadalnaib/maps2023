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
            'answer_one' => json_encode( ['de' => "Dieses Buchungsportal bietet dir als Nutzer die Möglichkeit an verschiedenen Standorten verschiedene Fächer zu nutzen. Mit einfacherer Registrierung wird dir ermöglicht Fächer bereits im Voraus oder auch über eine längere Zeit zu nutzen.
            Es können sowohl einfache Fächer für die Aufbewahrung von Gegenständen wie Gepäck oder Rucksäcken sein, oder auch Fächer für Fahrräder.
            " , 'en'=>"What´s the reason for this booking plattform"]),

            'question_two' => json_encode( ['de' => "Alle Fächer sind belegt" , 'en'=>"All lockers are booked"]),
            'answer_two' => json_encode( ['de' => "Im Video zeigen wir dir unsere Fächer für die sichere Aufbewahrung von Gegenständen und Fahrrädern" , 'en'=>"In the video you find details of our lockers for a safe storage of subjects and bikes"]),

            'question_three' => json_encode( ['de' => "Die Zahlung hat nicht funktioniert" , 'en'=>"Payment doesn´t work"]),
            'answer_three' => json_encode( ['de' => "Fach buchen war noch nie so einfach" , 'en'=>"Easy way to book a locker"]),

            'question_four' => json_encode( ['de' => "Code vergessen" , 'en'=>"Forgot my personal code"]),
            'answer_four' => json_encode( ['de' => "RFID-Karte verloren" , 'en'=>"Easy way to book a locker"]),
           
            'question_five' => json_encode( ['de' => "RFID-Karte verloren" , 'en'=>"Lose my RFID-card"]),
            'answer_five' => json_encode( ['de' => "Fach buchen war noch nie so einfach" , 'en'=>"Easy way to book a locker"]),
           
            'question_six' => json_encode( ['de' => "Fach öffnet nicht" , 'en'=>"Locker does not open "]),
            'answer_six' => json_encode( ['de' => "Fach buchen war noch nie so einfach" , 'en'=>"Easy way to book a locker"]),

            'question_seven' => json_encode( ['de' => "Was passiert wenn ich meine Mietdauer überschreite? " , 'en'=>"What happens if I exceed my rental period?"]),
            'answer_seven' => json_encode( ['de' => "Fach buchen war noch nie so einfach" , 'en'=>"Easy way to book a locker"]),

            'question_eight' => json_encode( ['de' => "Fehlgeschlagene Registrierung" , 'en'=>"problems with registration"]),
            'answer_eight' => json_encode( ['de' => "Fach buchen war noch nie so einfach" , 'en'=>"Easy way to book a locker"]),
           
           
           
           
         
           
            ];
            
          
            Faq::insert($pages);
     
    }
    
}
