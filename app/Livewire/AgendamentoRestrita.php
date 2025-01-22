<?php

namespace App\Livewire;

use App\Models\Agenda;
use App\Models\AgendaDia;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout('components.layouts.app-restrita')]
class AgendamentoRestrita extends Component
{
    public $diasDisponiveis = [];
    public $horariosDisponiveis = [];

    public $barbeiroSelecionado = 1;
    public $agenda = [];

    public $mesAtual = '10';
    public $anoAtual = '2024';

    public int $diaSelecionado = 0;
    public $dadosDiaSelecionado = [];
    public int $horarioSelecionado = 0;
    public function mount()
    {
        $this->barbeiroSelecionado = 1;
        $this->carregarDiasDisponiveis();

        $this->buscarAgendaBarbeiro($this->mesAtual,$this->anoAtual);

        //$this->gerarDiasMes($this->anoAtual,$this->mesAtual);

    }

    public function buscarAgendaBarbeiro($mes,$ano)
    {
        //busca a agenda do mes e ano atual do barbeiro selecionado + os dias disponiveis
        $agenda = Agenda::where('user_id',$this->barbeiroSelecionado)
            ->where('mes',$mes)
            ->where('ano',$ano)
            ->with('agendaDia')
            ->first();

        //garante que os dias estão na ordem correta
        $this->agenda = $agenda->agendaDia->sortBy('dia');

    }

    public function carregarDiasDisponiveis()
    {
        $diasDisponiveis = AgendaDia::where('agenda_id',$this->barbeiroSelecionado)->get();
        foreach ($diasDisponiveis as $key => $data){
            $dia = $this->traduzirDiaSemana(date('l', strtotime($data->dia)));
            $this->diasDisponiveis[$key] = [
                'id' => $data->id,
                'nome' => $dia['formatado'],
                'disponibilidade' => (bool)$data->disponibilidade
            ];
        }
    }

    public function carregarHorariosDisponiveis()
    {

        $horariosDisponiveis = [];
        $horarios = AgendaDia::find($this->diaSelecionado)->agendaDiaHorario;

        foreach ($horarios as $key => $horario){
            $horariosDisponiveis[$key] = [
                'id' => $horario->id,
                //'dia_id' => $horario->agenda_dia_id,
                'horario' => substr($horario->horario,0,5),
                'disponibilidade' => (bool)$horario->disponibilidade
            ];
        }
        $this->horariosDisponiveis = $horariosDisponiveis;
    }

    public function traduzirDiaSemana($dia): array
    {
        $dia = strtolower($dia);
        $dias = [
            'sunday' => [
                'formatado' => 'Domingo',
                'minusculo' => 'domingo'
            ],
            'monday' => [
                'formatado' => 'Segunda-feira',
                'minusculo' => 'segunda'
            ],
            'tuesday' => [
                'formatado' => 'Terça-feira',
                'minusculo' => 'terca'
            ],
            'wednesday' => [
                'formatado' => 'Quarta-feira',
                'minusculo' => 'quarta'
            ],
            'thursday' => [
                'formatado' => 'Quinta-feira',
                'minusculo' => 'quinta'
            ],
            'friday' => [
                'formatado' => 'Sexta-feira',
                'minusculo' => 'sexta'
            ],
            'saturday' => [
                'formatado' => 'Sábado',
                'minusculo' => 'sabado'
            ],
        ];

        return $dias[$dia];
    }
    public function alterarDiaSelecionado($diaId = 0)
    {
        $this->resetErrorBag();
        if ($diaId === 0) {
            $this->addError('diaSelecionado', 'Você deve selecionar um dia');
            return;
        }
        if (!empty($diaId)) {
            $diaDisponivel = AgendaDia::where('id',$diaId)
                ->where('disponibilidade',1)
                ->first();

            $this->dadosDiaSelecionado = $diaDisponivel;


            if (!$diaDisponivel){
                $this->addError('diaSelecionado', 'Ops! Este dia está indisponível');
                return;
            }
        }


        $this->diaSelecionado = $diaId;
        $this->horarioSelecionado = 0;
        $this->carregarHorariosDisponiveis();
    }

    function gerarDiasMes(int $year, int $month): array
    {
        $startOfMonth = Carbon::createFromDate($year, $month, 1)->startOfDay();
        $endOfMonth = $startOfMonth->copy()->endOfMonth();

        $days = [];
        while ($startOfMonth->lte($endOfMonth)) {
            $days[] = $startOfMonth->toDateTimeString();
            $startOfMonth->addDay();
        }

        return $days;
    }

    public function render()
    {
        return view('livewire.agendamento-restrita');
    }
}
