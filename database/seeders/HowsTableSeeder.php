<?php

namespace Database\Seeders;

use App\Models\How;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        How::create([
            'main_title' => 'Protect Your Bike with Peace of Mind',
            'main_subtitle' => "We've developed the ultimate locker to assist you in creating the perfect bike storage solution. With a focus on customization, our platform allows you to fully personalize every aspect of your bike locker, ensuring it meets your exact needs and preferences.",
            'video' => 'https://www.youtube.com/embed/FAFy9kYopuY?controls=0',
            'title_one' => 'Book Box was never this easy',
            'subtitle_one' => 'Use our online Book Box website.',
            'title_two' => 'Receive code',
            'subtitel_two' => 'Get your Pin Code and put your bike when it suits you!',
            'title_three' => 'Park safely',
            'subtitle_three' => 'Put your bike in your locker box.',
            'title_four' => 'Any time any day.',
            'subtitle_four' => 'Lockers are 24/7 which means you can access them when it suits you. No more changing your plans just for a parcel!',
        ]);
    }
}
