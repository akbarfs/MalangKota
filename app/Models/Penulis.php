<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    use HasFactory;
    protected $table = 'penulis';
    protected $primaryKey = 'id_penulis';

    public function berita(){
        return $this->hasMany("App\Models\Berita","id_penulis");
    }
}
