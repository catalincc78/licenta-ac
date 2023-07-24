<?php

namespace Database\Factories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Player::class;
    public function definition()
    {
        $post=$this->faker->randomElements(['LB', 'GK', 'RB', 'CB', 'CM' , 'CDM', 'CAM', 'CF', 'LW', 'RW', 'LF', 'RF', 'ST'],1,false);
        return [
            'first_name'=> $this->faker->firstName,
            'last_name'=> $this->faker->lastName,
            'age' => $this->faker->numberBetween(17,35),
            'market_value' => $this->faker->numberBetween(10000, 30000000),
            'post' => json_encode($post),
        ];
    }
}
