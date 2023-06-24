<?php

namespace Database\Seeders;

use App\Models\How;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('hows')->truncate();
        $pages[]= [
           
            'main_title' => json_encode( ['de' => "Bewahre deine Gegenstände oder dein Fahrrad sicher auf." , 'en'=>"Keep your subjects or bike safe"]),
            'main_subtitle' => json_encode( ['de' => "Im Video zeigen wir dir unsere Fächer für die sichere Aufbewahrung von Gegenständen und Fahrrädern" , 'en'=>"In the video you find details of our lockers for a safe storage of subjects and bikes"]),
            'title_one' => json_encode( ['de' => "Fach buchen war noch nie so einfach" , 'en'=>"Easy way to book a locker"]),
            'subtitle_one' => json_encode( ['de' => "Nutze unser Online Buchungsportal.

            Registriere dich
            Wähle deinen Standort
            Wähle dein Fach und deine Mietdauer
            Bezahle dein Fach diekt" , 'en'=>"Use our online booking plattform.

            Register 
            Choose your location
            Choose your locker and andrenting period
            Pay directly"]),
            
            'video' => 'https://www.youtube.com/embed/FAFy9kYopuY?controls=0',
           
            'title_two' => json_encode( ['de' => "Erhalte deinen persönlichen PIN" , 'en'=>"Get your personal code"]),
            'subtitle_two' => json_encode( ['de' => "
            Nutze deinen Code direkt an der Anlage." , 'en'=>"Use your code directly at the system."]),
            'title_three' => json_encode( ['de' => "Sichere Aufbewahrung" , 'en'=>"Safe storage"]),
            'subtitle_three' => json_encode( ['de' => "Öffen das Fach und verstaue deine Gegenstände oder dein Fahrrad" , 'en'=>"Open the locker and store your subjects or your  bike ."]),
            'title_four' => json_encode( ['de' => "Passende Möglichkeiten an unterschiedlichen Standorten" , 'en'=>"Suitable passibilitie at different locations."]),
            'subtitle_four' => json_encode( ['de' => "Es gibt Fächer in verschiedenen Größen und mit unterschiedlichen Ausstattungen" , 'en'=>"Different sizes if lockers and different features are available."]),
           
         
           
            ];
            
          
            How::insert($pages);
     
    }
}
