<?php

namespace Database\Factories;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Team::class;
    public function definition()
    {
        return [
            'name' => $this->faker->city,
            'rank' =>$this->faker->numberBetween(1,10),
        ];
    }
}
