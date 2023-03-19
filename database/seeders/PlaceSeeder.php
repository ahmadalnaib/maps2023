<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('places')->truncate();
        $place=new Place();
        $place->name="the first place";
        $place->slug="first";
        $place->image="1.jpeg";
        $place->category_id=1;
        $place->overview="this place is create by chat gpt";
        $place->address="kulmbach 12  dfdf";
        $place->user_id=1;
        $place->latitude=21.3924513;
        $place->longitude=39.8226124;
        $place->view_count=3;
        $place->save();

    }
}
