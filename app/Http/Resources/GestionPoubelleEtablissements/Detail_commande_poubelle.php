<?php

namespace App\Http\Resources\GestionPoubelleEtablissements;

use Illuminate\Http\Resources\Json\JsonResource;

class Detail_commande_poubelle extends JsonResource{
    public function toArray($request)
    {
        return [
            'id' => $this->id,

            'commande_poubelle_id' => $this->commande_poubelle_id,
            'stock_poubelle_id' => $this->stock_poubelle_id,
            'quantite' => $this->quantite,
            'prix_unitaires' => $this->prix_unitaires,

            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
            'deleted_at' => $this->deleted_at,

        ];      }
}
