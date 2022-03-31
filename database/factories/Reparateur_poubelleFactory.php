<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reparateur_poubelle>
 */
class Reparateur_poubelleFactory extends Factory{
    public function definition(){
        return [
            'nom'=> $this->faker->firstName,
            'prenom'=> $this->faker->lastName,
            'CIN'=> $this->faker->unique()->numerify('########'),
            'photo' => $this->faker->image('public/storage/images/reparateur_poubelle',640,480, null, false),
            'numero_telephone'=> $this->faker->unique()->e164PhoneNumber,
            'email'=> $this->faker->safeEmail,
            'adresse'=> $this->faker->address,
            'mot_de_passe'=> Hash::make($this->faker->password),
        ];
    }
}
