<?php

namespace Database\Seeders;

use App\Models\AgendaDia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgendaDiaHorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agendasDia = AgendaDia::all();

        $agendasDia->each(function ($agendaDia) {
            $agendaDia->agendaDiaHorario()->createMany($this->arrayHorarios());
        });
    }

    public function arrayHorarios(): array
    {
        $horarios = [
            '08:00:00',
            '08:30:00',
            '09:00:00',
            '09:30:00',
            '10:00:00',
            '10:30:00',
            '11:00:00',
            '11:30:00',
            '12:00:00',
            '12:30:00',
            '13:00:00',
            '13:30:00',
            '14:00:00',
            '14:30:00',
            '15:00:00',
            '15:30:00',
            '16:00:00',
            '16:30:00',
            '17:00:00',
            '17:30:00',
            '18:00:00',
            '18:30:00',
            '19:00:00',
        ];

        $arrayHorarios = [];
        foreach ($horarios as $horario) {
            $arrayHorarios[] = [
                'horario' => $horario,
                'disponibilidade' => true,
            ];
        }
        return $arrayHorarios;
    }
}
