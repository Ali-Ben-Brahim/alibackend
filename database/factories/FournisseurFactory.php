<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
class FournisseurFactory extends Factory
{
    public function definition()
    {
        return [
            'nom'=> $this->faker->firstName,
            'prenom'=> $this->faker->lastName,
            'CIN'=> $this->faker->unique()->numerify('########'),
            'photo' => $this->faker->image('public/storage/images/fournisseur',640,480, null, false),
            'numero_telephone'=> $this->faker->unique()->e164PhoneNumber,
            'email'=> $this->faker->safeEmail,
            'adresse'=>$this->faker->address,
        ];
    }
}
