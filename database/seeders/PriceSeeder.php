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
            'main_subtitle' => json_encode( ['de' => "Wir haben einige Abonnementpläne, die Ihren Bedürfnissen entsprechen. Werfen Sie einen Blick auf unsere Abo-Pläne unten.'
            " , 'en'=>"We have a few subscription plans that will fit the needs. Take a look at our subscription plans below.'"]),
            'title_one' => json_encode( ['de' => "Tägliches Abonnement" , 'en'=>"Daily Subscription"]),
            'subtitle_one' => json_encode( ['de' => "Unser Pro Bike Locker-Abonnement bietet Ihnen und Ihren radsportbegeisterten Kunden alles, was sie für ihren Erfolg benötigen. Mit diesem Abo haben Sie exklusiven Zugang zu unseren erstklassigen Fahrradabstellanlagen, begleitet von erstklassigem Support und einem umfassenden Angebot an Ressourcen, die auf Ihre Bedürfnisse zugeschnitten sind." , 'en'=>"Our Pro Bike Locker Subscription provides you and your cycling enthusiasts with everything needed to thrive. With this plan, you'll enjoy exclusive access to our premium bike storage facilities, accompanied by top-notch support and a comprehensive range of resources tailored to meet your biking needs."]),
            'price_one' => json_encode( ['de' =>1 , 'en'=>1]),
            'tag_one_one' => json_encode( ['de' => "Fahrrad aufladen" , 'en'=>"Bike Charging"]),
            'tag_one_two' => json_encode( ['de' => "Premium-Support" , 'en'=>"Premium-Support"]),
            'tag_one_three' => json_encode( ['de' => "Sicheres Schließfach" , 'en'=>"Secure Locker"]),
            'tag_one_four' => json_encode( ['de' => "Personalisierung " , 'en'=>"Customization "]),
            'tag_one_five' => json_encode( ['de' => "Einfache Nutzung" , 'en'=>"Easy Use"]),
            'tag_one_six' => json_encode( ['de' => "Unternehmen Branding" , 'en'=>"Company Branding"]),



          
            'title_two' => json_encode( ['de' => "Tägliches Abonnement" , 'en'=>"Daily Subscription"]),
            'subtitle_two' => json_encode( ['de' => "Unser Pro Bike Locker-Abonnement bietet Ihnen und Ihren radsportbegeisterten Kunden alles, was sie für ihren Erfolg benötigen. Mit diesem Abo haben Sie exklusiven Zugang zu unseren erstklassigen Fahrradabstellanlagen, begleitet von erstklassigem Support und einem umfassenden Angebot an Ressourcen, die auf Ihre Bedürfnisse zugeschnitten sind." , 'en'=>"Our Pro Bike Locker Subscription provides you and your cycling enthusiasts with everything needed to thrive. With this plan, you'll enjoy exclusive access to our premium bike storage facilities, accompanied by top-notch support and a comprehensive range of resources tailored to meet your biking needs."]),
            'price_two' => json_encode( ['de' =>1 , 'en'=>1]),
            'tag_two_one' => json_encode( ['de' => "Fahrrad aufladen" , 'en'=>"Bike Charging"]),
            'tag_two_two' => json_encode( ['de' => "Premium-Support" , 'en'=>"Premium-Support"]),
            'tag_two_three' => json_encode( ['de' => "Sicheres Schließfach" , 'en'=>"Secure Locker"]),
            'tag_two_four' => json_encode( ['de' => "Personalisierung " , 'en'=>"Customization "]),
            'tag_two_five' => json_encode( ['de' => "Einfache Nutzung" , 'en'=>"Easy Use"]),
            'tag_two_six' => json_encode( ['de' => "Unternehmen Branding" , 'en'=>"Company Branding"]),


            'title_three' => json_encode( ['de' => "Tägliches Abonnement" , 'en'=>"Daily Subscription"]),
            'subtitle_three' => json_encode( ['de' => "Unser Pro Bike Locker-Abonnement bietet Ihnen und Ihren radsportbegeisterten Kunden alles, was sie für ihren Erfolg benötigen. Mit diesem Abo haben Sie exklusiven Zugang zu unseren erstklassigen Fahrradabstellanlagen, begleitet von erstklassigem Support und einem umfassenden Angebot an Ressourcen, die auf Ihre Bedürfnisse zugeschnitten sind." , 'en'=>"Our Pro Bike Locker Subscription provides you and your cycling enthusiasts with everything needed to thrive. With this plan, you'll enjoy exclusive access to our premium bike storage facilities, accompanied by top-notch support and a comprehensive range of resources tailored to meet your biking needs."]),
            'price_three' => json_encode( ['de' =>1 , 'en'=>1]),
            'tag_three_one' => json_encode( ['de' => "Fahrrad aufladen" , 'en'=>"Bike Charging"]),
            'tag_three_two' => json_encode( ['de' => "Premium-Support" , 'en'=>"Premium-Support"]),
            'tag_three_three' => json_encode( ['de' => "Sicheres Schließfach" , 'en'=>"Secure Locker"]),
            'tag_three_four' => json_encode( ['de' => "Personalisierung " , 'en'=>"Customization "]),
            'tag_three_five' => json_encode( ['de' => "Einfache Nutzung" , 'en'=>"Easy Use"]),
            'tag_three_six' => json_encode( ['de' => "Unternehmen Branding" , 'en'=>"Company Branding"]),


            
            'title_four' => json_encode( ['de' => "Tägliches Abonnement" , 'en'=>"Daily Subscription"]),
            'subtitle_four' => json_encode( ['de' => "Unser Pro Bike Locker-Abonnement bietet Ihnen und Ihren radsportbegeisterten Kunden alles, was sie für ihren Erfolg benötigen. Mit diesem Abo haben Sie exklusiven Zugang zu unseren erstklassigen Fahrradabstellanlagen, begleitet von erstklassigem Support und einem umfassenden Angebot an Ressourcen, die auf Ihre Bedürfnisse zugeschnitten sind." , 'en'=>"Our Pro Bike Locker Subscription provides you and your cycling enthusiasts with everything needed to thrive. With this plan, you'll enjoy exclusive access to our premium bike storage facilities, accompanied by top-notch support and a comprehensive range of resources tailored to meet your biking needs."]),
            'price_four' => json_encode( ['de' =>1 , 'en'=>1]),
            'tag_four_one' => json_encode( ['de' => "Fahrrad aufladen" , 'en'=>"Bike Charging"]),
            'tag_four_two' => json_encode( ['de' => "Premium-Support" , 'en'=>"Premium-Support"]),
            'tag_four_three' => json_encode( ['de' => "Sicheres Schließfach" , 'en'=>"Secure Locker"]),
            'tag_four_four' => json_encode( ['de' => "Personalisierung " , 'en'=>"Customization "]),
            'tag_four_five' => json_encode( ['de' => "Einfache Nutzung" , 'en'=>"Easy Use"]),
            'tag_four_six' => json_encode( ['de' => "Unternehmen Branding" , 'en'=>"Company Branding"]),

           
           
           
         
           
            ];
            
          
            Price::insert($pages);
     
    
    }
}
