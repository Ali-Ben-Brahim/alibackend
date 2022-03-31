<?php

namespace App\Http\Resources\GestionPoubelleEtablissements;

use Illuminate\Http\Resources\Json\JsonResource;

class Bloc_poubelle extends JsonResource{
    public function toArray($request)
    {
       return [
        'id' => $this->id,

        'etablissement_id' => $this->etablissement_id,
        'bloc_etablissement' => $this->bloc_etablissement,
        'etage_etablissement' => $this->etage_etablissement,

        'created_at' => $this->created_at->format('d/m/Y'),
        'updated_at' => $this->updated_at->format('d/m/Y'),
        'deleted_at' => $this->deleted_at,
    ];
    }
}
