<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class Commande_poubelleFactory extends Factory{
    public function definition()
    {
        return [
            'responsable_etablissement_id'=>\App\Models\Responsable_etablissement::all()->random()->id,
            'quantite'=> $this->faker->numberBetween(1000,10000),
            'montant_total'=> $this->faker->randomFloat(3,10000,99999),
            'date_commande'=>$this->faker->dateTimeBetween('now', '+1 days')->format('Y.m.d H:i:s'),
            'date_livraison'=>$this->faker->dateTimeBetween('+5 days', '+30 days')->format('Y.m.d H:i:s'),
        ];
    }
}
