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
            'answer_one' => json_encode( ['de' => "Dieses Buchungsportal bietet dir als Nutzer die Möglichkeit an verschiedenen Standorten verschiedene Fächer zu nutzen. Mit einfacher Registrierung wird dir ermöglicht Fächer bereits im Voraus zu buchen und auch über eine längere Zeit zu nutzen. 

            Es können sowohl einfache Fächer für die Aufbewahrung von Gegenständen wie Gepäck oder Rucksäcken sein, oder auch Fächer für Fahrräder. 
            " , 'en'=>"This booking portal offers you as a user the possibility to use different lockers at different locations. With simple registration, you can book lockers in advance and use them for a longer period of time. 

            These can be slockers for storing items such as luggage or backpacks, or lockers for bicycles. "]),

            'question_two' => json_encode( ['de' => "Alle Fächer sind belegt" , 'en'=>"All lockers are booked"]),
            'answer_two' => json_encode( ['de' => "Über „Ein Fach finden“ kannst du dir eine Alternativen Standort und Fächer suchen. " , 'en'=>'You can search for an alternative location and lockers via "Find a locker". ']),

            'question_three' => json_encode( ['de' => "Die Zahlung hat nicht funktioniert" , 'en'=>"Payment doesn´t work"]),
            'answer_three' => json_encode( ['de' => "Bitte probiere es nach ein paar Minuten erneut. " , 'en'=>"Please try again after a few minutes. "]),

            'question_four' => json_encode( ['de' => "Code vergessen" , 'en'=>"Forgot my personal code"]),
            'answer_four' => json_encode( ['de' => 'Wenn du online gebucht hast, findest du deinen PIN-Code unter „Buchungen“ ' , 'en'=>'If you have booked online, you will find your PIN-code under "bookings". ']),
           
            'question_five' => json_encode( ['de' => "RFID-Karte verloren" , 'en'=>"Lose my RFID-card"]),
            'answer_five' => json_encode( ['de' => "Bitte wende dich an den Support. Kontaktdaten findest du an der Anlage. " , 'en'=>"Please contact the support team. Details you can find on the system. "]),
           
            'question_six' => json_encode( ['de' => "Fach öffnet nicht" , 'en'=>"Locker does not open "]),
            'answer_six' => json_encode( ['de' => "An der Anlage findest du die Kontaktdaten für Störungen an der Anlage.  " , 'en'=>"On the system you can find the contact details oft he support team "]),

            'question_seven' => json_encode( ['de' => "Was passiert wenn ich meine Mietdauer überschreite? " , 'en'=>"What happens if I exceed my rental period?"]),
            'answer_seven' => json_encode( ['de' => "Nach Überschreiten der Mietdauer kannst du dein Fach nicht mehr öffnen. Danach musst du dich beim Support melden. Die Kontaktdaten findest du an der Anlage. Deine Gegenstände wurden eventuell bereits entnommen. Strafgebühren können ja nach Eigentümer der Anlage anfallen. " , 'en'=>"Once the rental period has expired, you can no longer open your locker. After that, you have to contact the support. You will find the contact details on the system. Your items may have already been removed. Penalties may apply depending on the owner of the system. "]),

            'question_eight' => json_encode( ['de' => "Keine Registrierungs-Mail erhalten " , 'en'=>"No registration E-mail received "]),
            'answer_eight' => json_encode( ['de' => "Es kann einige Minuten dauern bis du eine E-Mail erhälst. Prüfe bitte auch deinen Spam-Ordner. " , 'en'=>"It may take a few minutes before you receive an E-mail. Please also check your spam folder. "]),
           
           
           
           
         
           
            ];
            
          
            Faq::insert($pages);
     
    }
    
}
