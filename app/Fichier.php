<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fichier extends Model
{
    //

    public function categorie(){
        return $this->belongsTo('App\Categorie');
    }
}
