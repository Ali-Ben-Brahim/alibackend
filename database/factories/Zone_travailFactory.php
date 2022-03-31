<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class Zone_travailFactory extends Factory{
    public function definition()
    {
        return [
            'region'=> $this->faker->city,
            'quantite_total_collecte_plastique'=> $this->faker->randomFloat(3,0, 10000),
            'quantite_total_collecte_composte'=> $this->faker->randomFloat(3,0, 10000),
            'quantite_total_collecte_papier'=> $this->faker->randomFloat(3,0, 10000),
            'quantite_total_collecte_canette'=> $this->faker->randomFloat(3,0, 10000),
        ];
    }
}
