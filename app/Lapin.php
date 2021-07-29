<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lapin extends Model
{
    //
    protected $fillable =[ 'nom', 'sexe', 'poids', 'couleur_pelage','race', 'type'];
}
