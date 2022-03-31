<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class Detail_commande_poubelleFactory extends Factory
{
    public function definition()
    {
        return [
            'commande_poubelle_id'=>\App\Models\Commande_poubelle::all()->random()->id,
            'stock_poubelle_id'=>\App\Models\Stock_poubelle::all()->random()->id,
            'quantite'=> $this->faker->numberBetween(1,100),
            'prix_unitaires'=> $this->faker->randomFloat(3,1000,90000),
        ];
    }
}
