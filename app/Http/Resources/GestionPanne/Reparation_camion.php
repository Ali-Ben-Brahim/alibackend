<?php

namespace App\Http\Resources\GestionPanne;

use Illuminate\Http\Resources\Json\JsonResource;

class Reparation_camion extends JsonResource{
    public function toArray($request)
    {
      return [
        'id' => $this->id,

        'camion_id' => $this->camion_id,
        'mecanicien_id' => $this->mecanicien_id,
        'image_panne_camion'=> $this->image_panne_camion,
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
