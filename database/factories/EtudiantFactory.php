<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Database\Eloquent\Factories\Factory;

class EtudiantFactory extends Factory
{   
    /**
     * The name of the factory's corresponding model.
     * 
     * @var string
     */
    protected $model = Etudiant::class;



    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->name,
            'adresse' =>$this->faker->address,
            'phone' =>$this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'dateNaissance' =>$this->faker->Date,
            'ville_id' => Ville::factory(),
            'user_id'=> User::factory()
        ];
    }
}
