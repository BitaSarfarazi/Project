<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Etudiant;
use App\Models\Forum;
use App\Models\Repertoire;
use App\Models\User;
use App\Models\Ville;


class RepertoireFactory extends Factory
{   
    /**
     * The name of the factory's corresponding model.
     * 
     * @var string
     */
    protected $model = Repertoire::class;



    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'date' =>$this->faker->dateTime,
            'langueTitle' =>$this->faker->languageCode,
            'langueSystem' => $this->faker->languageCode,
            'etudiant_id' => Etudiant::factory(),
           
        ];
    }
}
