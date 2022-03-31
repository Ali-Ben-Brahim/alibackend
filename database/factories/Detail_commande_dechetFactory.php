<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class Detail_commande_dechetFactory extends Factory{
    public function definition()
    {
        return [
                'commande_dechet_id'=>\App\Models\Commande_dechet::all()->random()->id,
                'dechet_id'=>\App\Models\Dechet::all()->random()->id,
                'quantite'=> $this->faker->numberBetween(1000,999999),
        ];
    }
}
