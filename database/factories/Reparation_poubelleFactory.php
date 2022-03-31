<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
class Reparation_poubelleFactory extends Factory{
    public function definition()
    {
        return [
            'poubelle_id'=>\App\Models\Poubelle::all()->random()->id,
            'reparateur_poubelle_id'=>\App\Models\Reparateur_poubelle::all()->random()->id,
            'image_panne_poubelle' => $this->faker->image('public/storage/images/pannePoubelle',640,480, null, false),
            'description_panne'=> $this->faker->sentence,
            'cout'=> $this->faker->numberBetween(5000,100000),
            'date_debut_reparation'=>$this->faker->dateTimeBetween('now','+30 days')->format('Y.m.d H:i:s'),
            'date_fin_reparation'=>$this->faker->dateTimeBetween('date_debut_reparation', '+30 days')->format('Y.m.d H:i:s'),
        ];
    }
}
