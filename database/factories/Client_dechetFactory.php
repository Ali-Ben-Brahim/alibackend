<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Client_dechetFactory extends Factory{
    public function definition(){
        return [
            'nom'=> $this->faker->firstName,
            'prenom'=> $this->faker->lastName,
            'CIN'=> $this->faker->unique()->numerify('########'),
            'photo' => $this->faker->image('public/storage/images/client',640,480, null, false),
            'numero_telephone'=> $this->faker->unique()->e164PhoneNumber,
            'email'=> $this->faker->safeEmail,
            'adresse'=> $this->faker->address,
            'mot_de_passe'=> Hash::make($this->faker->password),
            'remember_token' => Str::random(10),

        ];
    }
        /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
