<?php

namespace App\Http\Resources\GestionDechet;

use Illuminate\Http\Resources\Json\JsonResource;

class Dechet extends JsonResource{
    public function toArray($request){
       return [
        'id' => $this->id,

        'type_dechet' => $this->type_dechet,
        'prix_unitaire' => $this->prix_unitaire,

        'created_at' => $this->created_at->format('d/m/Y'),
        'updated_at' => $this->updated_at->format('d/m/Y'),
        'deleted_at' => $this->deleted_at,
    ];
    }
}
