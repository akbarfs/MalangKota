<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag1 = new Tag;
        $tag1->tag = "Covid";
        $tag1->save();

        $tag2 = new Tag;
        $tag2->tag = "Cuaca";
        $tag2->save();

        $tag3 = new Tag;
        $tag3->tag = "Saham";
        $tag3->save();

    }
}
