<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    //

    public function fichiers (){
        return $this->hasMany('App\Fichier');
    }
}
