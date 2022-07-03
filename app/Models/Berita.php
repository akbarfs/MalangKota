<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita';
    protected $primaryKey = 'id_berita';

    public function kategori(){
        return $this->
        belongsTo("App\Models\Kategori","id_kategori");
    }

    public function penulis(){
        return $this->belongsTo("App\Models\Penulis","id_penulis");
    }

    public function tag(){
        return $this->belongsToMany("App\Models\Tag","tag_berita","id_berita","id_tag");
    }

}
