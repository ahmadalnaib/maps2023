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
           
            'main_title' => json_encode( ['de' => "Einfache, flexible Preisgestaltung" , 'en'=>"Simple, Flexible Pricing"]),
            'main_subtitle' => json_encode( ['de' => "Wir bieten sichere Fahrradschließfächer zur Vermietung an. Sie können ein Schließfach mieten, um Ihr Fahrrad sicher und bequem aufzubewahren. Unsere Schließfächer sind mit Sicherheitseinrichtungen ausgestattet und bieten Schutz vor Diebstahl oder Beschädigung von Fahrrädern.

            Sie können unseren Service nutzen, indem Sie ein Fahrradschließfach für die gewünschte Zeit mieten. Unsere Schließfächer bieten flexible Mietdauern und wettbewerbsfähige Preise. Unabhängig von der gewählten Mietdauer können Sie sich auf ein sicheres Schließfach verlassen, um Ihr Fahrrad zu schützen.
            
            Kontaktieren Sie uns für weitere Informationen über unseren Fahrradschließfach-Verleih-Service und um vollständige Details zu Preisen, Bedingungen und wie Sie den Service in Anspruch nehmen können, zu erfahren.
        " , 'en'=>"We offer secure bicycle lockers for rental. You can rent a locker to safely and conveniently store your bicycle. Our lockers are equipped with security features and provide protection against theft or damage to bicycles.

            You can take advantage of our service by renting a bicycle locker for the desired duration. Our lockers offer flexible rental periods and competitive prices. Regardless of the chosen rental duration, you can rely on a secure locker to protect your bicycle.
            
            Contact us for more information about our bicycle locker rental service and to learn the complete details about pricing, terms, and how to avail the service.
            
       "]),
         
           
         
           
            ];
            
          
            Price::insert($pages);
     
    
    }
}
