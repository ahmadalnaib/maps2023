<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Faq::create([
            'question_one' => 'What are the advantages of the bike box system?',
            'answer_one' => "Easy online registration via an electronic access and booking system.",
            'question_two' => 'What are the advantages of the bike box system?',
            'answer_two' => "Easy online registration via an electronic access and booking system.",
            'question_three' => 'What are the advantages of the bike box system?',
            'answer_three' => "Easy online registration via an electronic access and booking system.",
            'question_four' => 'What are the advantages of the bike box system?',
            'answer_four' => "Easy online registration via an electronic access and booking system.",
            'question_five' => 'What are the advantages of the bike box system?',
            'answer_five' => "Easy online registration via an electronic access and booking system.",
            'question_six' => 'What are the advantages of the bike box system?',
            'answer_six' => "Easy online registration via an electronic access and booking system.",
            'question_seven' => 'What are the advantages of the bike box system?',
            'answer_seven' => "Easy online registration via an electronic access and booking system.",
            'question_eight' => 'What are the advantages of the bike box system?',
            'answer_eight' => "Easy online registration via an electronic access and booking system.",
            'question_nine' => 'What are the advantages of the bike box system?',
            'answer_nine' => "Easy online registration via an electronic access and booking system.",
            'question_ten' => 'What are the advantages of the bike box system?',
            'answer_ten' => "Easy online registration via an electronic access and booking system.",
           
        ]);
    }
}
