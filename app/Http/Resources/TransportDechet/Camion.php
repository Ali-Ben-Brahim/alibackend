<?php

namespace App\Http\Resources\TransportDechet;

use Illuminate\Http\Resources\Json\JsonResource;

class Camion extends JsonResource{
    public function toArray($request)
    {
        return [
            'id' => $this->id,

            'zone_travail_id' => $this->zone_travail_id,
            'matricule' => $this->matricule,
            'qrcode' => $this->qrcode,
            'heure_sortie' => $this->heure_sortie,
            'heure_entree' => $this->heure_entree,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'volume_maximale_poubelle' => $this->volume_maximale_poubelle,
            'volume_actuelle_plastique' => $this->volume_actuelle_plastique,
            'volume_actuelle_papier' => $this->volume_actuelle_papier,
            'volume_actuelle_composte' => $this->volume_actuelle_composte,
            'volume_actuelle_canette' => $this->volume_actuelle_canette,
            'volume_carburant_consomme' => $this->volume_carburant_consomme,
            'Kilometrage' => $this->Kilometrage,

            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
            'deleted_at' => $this->deleted_at,

        ];
    }
}

