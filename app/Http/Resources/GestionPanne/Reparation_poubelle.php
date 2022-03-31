<?php

namespace App\Http\Resources\GestionPanne;

use Illuminate\Http\Resources\Json\JsonResource;

class Reparation_poubelle extends JsonResource{
    public function toArray($request)
    {
       return [
        'id' => $this->id,

        'poubelle_id' => $this->poubelle_id,
        'reparateur_poubelle_id' => $this->reparateur_poubelle_id,
        'image_panne_poubelle'=> $this->image_panne_poubelle,
        'description_panne' => $this->description_panne,
        'cout' => $this->cout,
        'date_debut_reparation' => $this->date_debut_reparation,
        'date_fin_reparation' => $this->date_fin_reparation,

        'created_at' => $this->created_at->format('d/m/Y'),
        'updated_at' => $this->updated_at->format('d/m/Y'),
        'deleted_at' => $this->deleted_at,
    ];
    }
}
