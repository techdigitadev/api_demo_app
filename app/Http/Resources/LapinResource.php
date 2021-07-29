<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LapinResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'sexe' => $this->sexe,
            'poids' => $this->poids,
            'couleur_pelage' => $this->couleur_pelage,
            'race' => $this->race,
            'type' => $this->type,
        ];
    }
}
