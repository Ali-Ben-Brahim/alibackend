<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class Zone_depotFactory extends Factory{
    public function definition() {
        return [
            'adresse'=> $this->faker->address,
            'longitude'=> $this->faker->longitude($min = -180, $max = 180),
            'latitude'=> $this->faker->latitude($min = -90, $max = 90),
            'quantite_depot_maximale'=> $this->faker->randomNumber(5,true),
            'quantite_depot_actuelle_plastique'=> $this->faker->randomNumber(5,true),
            'quantite_depot_actuelle_papier'=> $this->faker->randomNumber(5,true),
            'quantite_depot_actuelle_composte'=> $this->faker->randomNumber(5,true),
            'quantite_depot_actuelle_canette'=> $this->faker->randomNumber(5,true),
        ];
    }
}
