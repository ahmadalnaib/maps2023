<?php

namespace Database\Seeders;

use App\Models\Price;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Price::create([
            'main_title' => 'Simple, Flexible Pricing',
            'main_subtitle' => 'We have a few subscription plans that will fit the needs. Take a look at our subscription plans below.',
            "title_one"=>"Daily Subscription",
            "subtitle_one"=>"Our Pro Bike Locker Subscription provides you and your cycling enthusiasts with everything needed to thrive. With this plan, you'll enjoy exclusive access to our premium bike storage facilities, accompanied by top-notch support and a comprehensive range of resources tailored to meet your biking needs.",
            "price_one"=>2,
            "tag_one_one"=>"Bike Charging",
            "tag_one_two"=>"Premium Support",
            "tag_one_three"=>"Secure Locker",
            "tag_one_four"=>"Easy Use",
            "tag_one_five"=>"Customization Settings",
            "tag_one_six"=>"Company Branding",


            "title_two"=>"Weekly Subscription",
            "subtitle_two"=>"Our Pro Bike Locker Subscription provides you and your cycling enthusiasts with everything needed to thrive. With this plan, you'll enjoy exclusive access to our premium bike storage facilities, accompanied by top-notch support and a comprehensive range of resources tailored to meet your biking needs.",
            "price_two"=>7,
            "tag_two_one"=>"Bike Charging",
            "tag_two_two"=>"Premium Support",
            "tag_two_three"=>"Secure Locker",
            "tag_two_four"=>"Easy Use",
            "tag_two_five"=>"Customization Settings",
            "tag_two_six"=>"Company Branding",


            "title_three"=>"Monthly Subscription",
            "subtitle_three"=>"Our Pro Bike Locker Subscription provides you and your cycling enthusiasts with everything needed to thrive. With this plan, you'll enjoy exclusive access to our premium bike storage facilities, accompanied by top-notch support and a comprehensive range of resources tailored to meet your biking needs.",
            "price_three"=>30,
            "tag_three_one"=>"Bike Charging",
            "tag_three_two"=>"Premium Support",
            "tag_three_three"=>"Secure Locker",
            "tag_three_four"=>"Easy Use",
            "tag_three_five"=>"Customization Settings",
            "tag_three_six"=>"Company Branding",


            "title_four"=>"Yearly Subscription",
            "subtitle_four"=>"Our Pro Bike Locker Subscription provides you and your cycling enthusiasts with everything needed to thrive. With this plan, you'll enjoy exclusive access to our premium bike storage facilities, accompanied by top-notch support and a comprehensive range of resources tailored to meet your biking needs.",
            "price_four"=>100,
            "tag_four_one"=>"Bike Charging",
            "tag_four_two"=>"Premium Support",
            "tag_four_three"=>"Secure Locker",
            "tag_four_four"=>"Easy Use",
            "tag_four_five"=>"Customization Settings",
            "tag_four_six"=>"Company Branding",
          




          
           
        ]);
    }
}
