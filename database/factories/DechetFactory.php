<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class DechetFactory extends Factory{
    public function definition(){
        return [
            'type_dechet'=> $this->faker->randomElement(['plastique', 'composte','papier','canette']),
            'prix_unitaire'=>$this->faker->randomFloat(3,1000,9999),
        ];
    }
}
