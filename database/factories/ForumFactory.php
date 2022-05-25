<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Etudiant;
use App\Models\Forum;
use App\Models\User;
use App\Models\Ville;

class ForumFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     * 
     * @var string
     */
    protected $model = Forum::class;
    
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'content' =>$this->faker->paragraph,
            'etudiant_id' => Etudiant::factory(),
           
        ];
    }
}
