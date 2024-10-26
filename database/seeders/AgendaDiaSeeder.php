<?php

namespace Database\Seeders;

use App\Models\Agenda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgendaDiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agendas = Agenda::all();

        $agendas->each(function ($agenda) {
            $agenda->agendaDia()->createMany($this->arrayDateTimeMesCompleto());



        });

    }

    public function arrayDateTimeMesCompleto():array
    {
        //monta um array com todos os dias do mes atual no formato: 2024-11-26 00:00:00 usando carbon

        $arrayDiasMes = [];

        $qtdDiasMesAtual = now()->daysInMonth; //31
        $mesAtual = now()->month; //10
        $anoAtual = now()->year; //2024

        for ($i = 1; $i <= 31; $i++) {
            $arrayDiasMes[] = [
                'dia' => now()->setYear($anoAtual)->setMonth($mesAtual)->setDay($i)->toDateTimeString(),
                'disponibilidade' => true,
            ];
        }
        return $arrayDiasMes;



    }
}
