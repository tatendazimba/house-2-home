<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            "name" => "Hero"
        ]);

        Tag::create([
            "name" => "Inspiration"
        ]);

        Tag::create([
            "name" => "Sales & Offers"
        ]);

        Tag::create([
            "name" => "New"
        ]);

        Tag::create([
            "name" => "Shop"
        ]);

        Tag::create([
            "name" => "Bedroom"
        ]);

        Tag::create([
            "name" => "Living Room"
        ]);

        Tag::create([
            "name" => "Cushions & Pillows"
        ]);

        Tag::create([
            "name" => "Mink"
        ]);

        Tag::create([
            "name" => "Throw"
        ]);

        Tag::create([
            "name" => "Mirror"
        ]);

        Tag::create([
            "name" => "Table"
        ]);

        Tag::create([
            "name" => "Kitchen"
        ]);

        Tag::create([
            "name" => "Mug"
        ]);

        Tag::create([
            "name" => "Lamp"
        ]);

        Tag::create([
            "name" => "Clock"
        ]);

        Tag::create([
            "name" => "Vase"
        ]);

        Tag::create([
            "name" => "Closet"
        ]);

        Tag::create([
            "name" => "Night Stand"
        ]);

        Tag::create([
            "name" => "Rugs"
        ]);

        Tag::create([
            "name" => "Storage"
        ]);

        Tag::create([
            "name" => "Chair"
        ]);

//        factory(Tag::class, 34)->create();
    }
}
