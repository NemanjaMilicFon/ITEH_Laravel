<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Owner;
use Illuminate\Database\Seeder;
use App\Models\Cat;
use App\Models\Breed;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        User::truncate();
        Breed::truncate();
        Owner::truncate();
        Cat::truncate();

        User::factory(10)->create();

        Breed::insert([
            [
                "name" => "Sijamska",
                "originCity" => "Siamese",
                "characteristics" => "Sijamske macke su debele i imaju dugacku dlaku obicno zute boje"
            ],
            [
                "name" => "Domaca",
                "originCity" => "Beograd",
                "characteristics" => "Domaca macka je vrsta macke koju vidjamo po kucama."
            ],
            [
                "name" => "Kratkodlaka",
                "originCity" => "Paris",
                "characteristics" => "Ovo je vrsta koja ima jako kratku i cvrstu dlaku."
            ]
        ]);

        Owner::insert([
            [
                "name" => "Ana Andric",
                "birth_year" => 1992,
                "is_male" => false,
                "nationality" => "Serbian Bosnian",
                "height" => 241
            ],
            [
                "name" => "Desanka Maksimovic",
                "birth_year" => 1922,
                "is_male" => false,
                "nationality" => "Serbian",
                "height" => 151
            ]
        ]);


        $cat_1 = new Cat;
        $cat_1->name = "Milica";
        $cat_1->color = "White";
        $cat_1->description = "Luda zabavna macka";
        $cat_1->price = 860;
        $cat_1->age = 6;
        $cat_1->breed_id = 1;
        $cat_1->owner_id = 1;
        $cat_1->save();

        $cat_2 = new Cat;
        $cat_2->name = "Perica";
        $cat_2->color = "Black";
        $cat_2->description = "Dosadan pospani macak";
        $cat_2->price = 999;
        $cat_2->age = 6;
        $cat_2->breed_id = 1;
        $cat_2->owner_id = 1;
        $cat_2->save();

        Cat::create([
            "name" => "Djokica",
            "color" => "Silver",
            "description" => "Super brz i umiljat",
            "price" => 720,
            "age" => 1,
            "breed_id" => 2,
            "owner_id" => 2
        ]);
    }
}
