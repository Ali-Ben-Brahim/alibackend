<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
class PoubelleFactory extends Factory{
    public function definition(){
        $type_poubelle = $this->faker->randomElement(['PL','PA','CO','CA']);
        $zone_travail =  \App\Models\Zone_travail::all()->random()->id;
        $etablissement =  \App\Models\Etablissement::all()->random()->id;
        $bloc_poubelle = \App\Models\Bloc_poubelle::all()->random()->id;

        $poubelle = $type_poubelle.'-Z'.$zone_travail.'-E'.$etablissement.'-B'.$bloc_poubelle;

        $qrcode= Hash::make($poubelle);

        return [
            'bloc_poubelle_id'=>$bloc_poubelle,
            'nom'=> $poubelle,
            'qrcode' => $qrcode,
            'capacite_poubelle'=>$this->faker->randomNumber(4,true),
            'type'=>  $this->faker->randomElement(['plastique','papier','composte','canette']),
            'Etat'=>$this->faker->numberBetween(0,100),
            'temps_remplissage'=>$this->faker->dateTimeBetween('now', '+7 days')->format('Y.m.d H:i:s'),
        ];
    }
}
