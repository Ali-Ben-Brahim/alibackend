<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class Commande_dechetFactory extends Factory
{
    public function definition()
    {
        return [
            'client_dechet_id'=>\App\Models\Client_dechet::all()->random()->id,
            'quantite'=> $this->faker->numberBetween(1000,10000),
            'montant_total'=> $this->faker->randomFloat(3,100,1000),
            'date_commande'=>$this->faker->dateTimeBetween('now', '+1 days')->format('Y.m.d H:i:s'),
            'date_livraison'=>$this->faker->dateTimeBetween('+5 days', '+30 days')->format('Y.m.d H:i:s'),
        ];
    }
}
