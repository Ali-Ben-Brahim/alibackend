<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class Bloc_poubelleFactory extends Factory{
    public function definition() {
        return [
            'etablissement_id'=> \App\Models\Etablissement::all()->random()->id,
            'bloc_etablissement'=> $this->faker->sentence,
            'etage_etablissement'=> $this->faker->sentence,
        ];
    }
}

