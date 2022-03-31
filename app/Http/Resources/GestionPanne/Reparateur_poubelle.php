<?php

namespace App\Http\Resources\GestionPanne;

use Illuminate\Http\Resources\Json\JsonResource;

class Reparateur_poubelle extends JsonResource{
    public function toArray($request)
    {
       return [
        'id' => $this->id,

        'nom' => $this->nom,
        'prenom' => $this->prenom,
        'CIN' => $this->CIN,
        'photo' => $this->photo,
        'numero_telephone' => $this->numero_telephone,
        'email' => $this->email,
        'adresse'=> $this->adresse,
        'mot_de_passe' => $this->mot_de_passe,

        'created_at' => $this->created_at->format('d/m/Y'),
        'updated_at' => $this->updated_at->format('d/m/Y'),
        'deleted_at' => $this->deleted_at,
    ];
    }
}
