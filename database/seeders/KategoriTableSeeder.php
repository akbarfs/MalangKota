<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori1 = new Kategori;
        $kategori1->kategori = "Umum";
        $kategori1->save();

        $kategori2 = new Kategori;
        $kategori2->kategori = "Pariwisata";
        $kategori2->save();

        $kategori3 = new Kategori;
        $kategori3->kategori = "Ekonomi";
        $kategori3->save();

    }
}
