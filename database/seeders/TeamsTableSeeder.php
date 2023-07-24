<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\Player;
use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::factory()->count(10)->create()->each(function($t)
        {
            for($i=0;$i<=10;++$i)
            {
                $t->players()->attach(Player::factory()->create());
            }
        });
    }
}
