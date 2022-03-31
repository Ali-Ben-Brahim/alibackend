<?php

namespace App\Http\Resources\ProductionPoubelle;

use Illuminate\Http\Resources\Json\JsonResource;

class Stock_poubelle extends JsonResource{

    public function toArray($request)
    {
        return [
            'id' => $this->id,

            'quantite_disponible_plastique'=> $this->quantite_disponible_plastique,
            'quantite_disponible_canette'=> $this->quantite_disponible_canette,
            'quantite_disponible_composte'=> $this->quantite_disponible_composte,
            'quantite_disponible_papier'=> $this->quantite_disponible_papier,
            'capacite_poubelle'=> $this->capacite_poubelle,

            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
            'deleted_at' => $this->deleted_at,
        ];    }
}
