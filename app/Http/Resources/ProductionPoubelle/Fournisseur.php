<?php

namespace App\Http\Resources\ProductionPoubelle;

use Illuminate\Http\Resources\Json\JsonResource;

class Fournisseur extends JsonResource{
    public function toArray($request){
       return [
        'id' => $this->id,

        'nom' => $this->nom,
        'prenom' => $this->prenom,
        'CIN' => $this->CIN,
        'photo' => $this->photo,
        'numero_telephone' => $this->numero_telephone,
        'email' => $this->email,
        'adresse'=> $this->adresse,

        'created_at' => $this->created_at->format('d/m/Y'),
        'updated_at' => $this->updated_at->format('d/m/Y'),
        'deleted_at' => $this->deleted_at,

    ];
    }
}
