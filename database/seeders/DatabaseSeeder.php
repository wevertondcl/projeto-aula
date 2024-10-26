<?php

namespace Database\Seeders;

use App\Models\Agenda;
use App\Models\AgendaDia;
use App\Models\AgendaDiaHorario;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()
            ->has(
                Agenda::factory()
                    ->count(1)
            )
            ->count(10)
            ->create();


        $this->call([
            AgendaDiaSeeder::class,
            AgendaDiaHorarioSeeder::class,
        ]);

    }
}
