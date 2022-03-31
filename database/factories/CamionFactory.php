<?php
namespace Database\Factories;

use App\Models\Zone_travail;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class CamionFactory extends Factory{
    public function definition(){
        $zone_travail_id = \App\Models\Zone_travail::all()->random()->id;
        $matricule =  $this->faker->unique()->bothify('####???####');
        $qrcode = Hash::make($matricule);
        return [
            'zone_travail_id'=> $zone_travail_id,
            'matricule' =>$matricule,
            'qrcode' => $qrcode,
            'heure_sortie'=>$this->faker->dateTimeBetween('now', '+1 days')->format('Y.m.d H:i:s'),
            'heure_entree'=>$this->faker->dateTimeBetween('now', '+2 days')->format('Y.m.d H:i:s'),
            'longitude'=> $this->faker->longitude($min = -180, $max = 180),
            'latitude'=> $this->faker->latitude($min = -90, $max = 90),
            'volume_maximale_poubelle'=> $this->faker->randomFloat(0,0,360),
            'volume_actuelle_plastique'=> $this->faker->randomFloat(3,0,359),
            'volume_actuelle_papier'=> $this->faker->randomFloat(3,0, 359),
            'volume_actuelle_composte'=> $this->faker->randomFloat(3,0, 359),
            'volume_actuelle_canette'=> $this->faker->randomFloat(3,0, 359),
            'volume_carburant_consomme'=> $this->faker->randomFloat(3,0,100),
            'Kilometrage'=> $this->faker->randomFloat(3,0, 1000),
        ];
    }
}
