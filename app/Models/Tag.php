<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tag';
    protected $primaryKey = 'id_tag';
    
    public function berita(){
        return $this->
        belongsToMany("App\Models\Berita","tag_berita","id_tag","id_berita");
    }
}
