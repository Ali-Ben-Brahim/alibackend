<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class Reparation_camionFactory extends Factory{
    public function definition(){
        return [
            'camion_id'=>\App\Models\Camion::all()->random()->id,
            'mecanicien_id'=>\App\Models\Mecanicien::all()->random()->id,
            'image_panne_camion' => $this->faker->image('public/storage/images/panneCamion',640,480, null, false),
            'description_panne'=> $this->faker->sentence,
            'cout'=> $this->faker->numberBetween(5000,100000),
            'date_debut_reparation'=>$this->faker->dateTimeBetween('now','+30 days')->format('Y.m.d H:i:s'),
            'date_fin_reparation'=>$this->faker->dateTimeBetween('date_debut_reparation', '+30 days')->format('Y.m.d H:i:s'),

        ];
    }
}
