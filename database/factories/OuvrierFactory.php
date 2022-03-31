<?php
namespace Database\Factories;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OuvrierFactory extends Factory{
    public function definition(){
        $email =  $this->faker->safeEmail;
        $qr= Hash::make($email);
        return [
            'zone_travail_id'=> \App\Models\Zone_travail::all()->random()->id,
            'camion_id'=>  \App\Models\Camion::all()->random()->id,
            'poste'=>  $this->faker->randomElement(['conducteur' ,'agent']),
            'qrcode' => $qr,
            'nom'=> $this->faker->firstName,
            'prenom'=> $this->faker->lastName,
            'CIN'=> $this->faker->unique()->numerify('########'),
            'photo' => $this->faker->image('public/storage/images/ouvrier',640,480, null, false),
            'numero_telephone'=> $this->faker->unique()->e164PhoneNumber,
            'email'=> $email,
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
