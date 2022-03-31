<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class Stock_poubelleFactory extends Factory{
    public function definition()
    {
        return [
            'capacite_poubelle'=>$this->faker->randomNumber(4,true),
            'quantite_disponible_plastique'=>$this->faker->randomNumber(4,true),
            'quantite_disponible_canette'=>$this->faker->randomNumber(4,true),
            'quantite_disponible_composte'=>$this->faker->randomNumber(4,true),
            'quantite_disponible_papier'=>$this->faker->randomNumber(4,true),
        ];
    }
}
