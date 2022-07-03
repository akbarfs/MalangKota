<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penulis;

class PenulisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $penulis1 = new Penulis;
        $penulis1->penulis = "Rakan";
        $penulis1->email_penulis = "Rakan@gmail.com";
        $penulis1->save();

        $penulis2 = new Penulis;
        $penulis2->penulis = "Sutrisno";
        $penulis2->email_penulis = "trisn0@gmail.com";
        $penulis2->save();

        $penulis3 = new Penulis;
        $penulis3->penulis = "Yanto";
        $penulis3->email_penulis = "Yanto083@gmail.com";
        $penulis3->save();

    }
}
