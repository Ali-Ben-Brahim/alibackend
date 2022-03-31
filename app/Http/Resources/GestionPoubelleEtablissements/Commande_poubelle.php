<?php

namespace App\Http\Resources\GestionPoubelleEtablissements;

use Illuminate\Http\Resources\Json\JsonResource;

class Commande_poubelle extends JsonResource{
    public function toArray($request)
    {
        return [
            'id' => $this->id,

            'responsable_etablissement_id' => $this->responsable_etablissement_id,
            'quantite' => $this->quantite,
            'montant_total' => $this->montant_total,
            'date_commande' => $this->date_commande,
            'date_livraison' => $this->date_livraison,

            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
            'deleted_at' => $this->deleted_at,
        ];    }
}
