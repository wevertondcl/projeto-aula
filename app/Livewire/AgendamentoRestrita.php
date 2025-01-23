<?php

namespace App\Livewire;

use App\Models\Agenda;
use App\Models\AgendaDia;
use App\Models\AgendaDiaHorario;
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

    public $mesAtual = '';
    public $anoAtual = '';

    public int $diaSelecionado = 0;
    public $dadosDiaSelecionado = [];
    public int $horarioSelecionado = 0;

    public bool $proximoMes = true;
    public bool $mesAnterior = true;
    public function mount()
    {
        $this->barbeiroSelecionado = 1;
        $dataUltimaAgenda = Agenda::where('user_id',$this->barbeiroSelecionado)
            ->orderBy('ano','desc')
            ->orderBy('mes','desc')
            ->first();
        if ($dataUltimaAgenda){
            $this->mesAtual = $dataUltimaAgenda->mes;
            $this->anoAtual = $dataUltimaAgenda->ano;
            $this->buscarAgendaBarbeiro($this->mesAtual,$this->anoAtual);
        }

    }

    public function verificarAgendaBarbeiro($mes,$ano): bool
    {
        $agenda = Agenda::where('user_id',$this->barbeiroSelecionado)
            ->where('mes',$mes)
            ->where('ano',$ano)
            ->first();
        if ($agenda){
            return true;
        }
        return false;

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
                //->where('disponibilidade',1)
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

    public function gerarDiasMes(int $year, int $month): array
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

    public function gerarHorariosDia($diaId)
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
            '19:00:00'
        ];
        $horariosDisponiveis = [];
        foreach ($horarios as $key => $horario){
            $horariosDisponiveis[$key] = [
                'agenda_dia_id' => $diaId,
                'horario' => $horario,
                'disponibilidade' => 1
            ];
        }
        return $horariosDisponiveis;

    }


    public function adicionarMes()
    {
        $dataUltimaAgenda = Agenda::where('user_id',$this->barbeiroSelecionado)
            ->orderBy('ano','desc')
            ->orderBy('mes','desc')
            ->first();
        if (!$dataUltimaAgenda){
            $proximoMesValido = Carbon::now();
        }else{
            $dataUltimaAgenda = Carbon::createFromDate($dataUltimaAgenda->ano,$dataUltimaAgenda->mes,1);
            $proximoMesValido = Carbon::createFromDate($dataUltimaAgenda->year,$dataUltimaAgenda->month,1)->addMonth();
        }

        $novaAgenda = Agenda::create([
            'user_id' => $this->barbeiroSelecionado,
            'mes' => $proximoMesValido->month,
            'ano' => $proximoMesValido->year,
            'status' => 1
        ]);

        $novoMes = $this->gerarDiasMes($proximoMesValido->year,$proximoMesValido->month);
        foreach ($novoMes as $key => $dia){
            $diaDisponivel = AgendaDia::create([
                'agenda_id' => $novaAgenda->id,
                'dia' => $dia,
                'disponibilidade' => 1
            ]);
            $horarios = $this->gerarHorariosDia($diaDisponivel->id);
            $diaDisponivel->agendaDiaHorario()->createMany($horarios);
        }
        $this->proximoMes = false;
        $this->mesAnterior = true;
        $this->mesAtual = $proximoMesValido->month;
        $this->anoAtual = $proximoMesValido->year;
        $this->buscarAgendaBarbeiro($proximoMesValido->month,$proximoMesValido->year);
    }


    public function avancarMes()
    {
        if ($this->proximoMes === false){
            return;
        }
        $mesAtual =  $this->mesAtual;
        $anoAtual = $this->anoAtual;
        $mesAtual++;
        if ($mesAtual > 12){
            $mesAtual = 1;
            $anoAtual++;
        }

        $agendaValida = $this->verificarAgendaBarbeiro($mesAtual,$anoAtual);

        if ($agendaValida){
            $this->proximoMes = true;
            $this->mesAnterior = true;
            $this->mesAtual = $mesAtual;
            $this->anoAtual = $anoAtual;
            $this->buscarAgendaBarbeiro($this->mesAtual,$this->anoAtual);
        }else{
            $this->proximoMes = false;
        }


    }

    public function voltarMes()
    {
        if ($this->mesAnterior === false){
            return;
        }
        $mesAtual =  $this->mesAtual;
        $anoAtual = $this->anoAtual;
        $mesAtual--;
        if ($mesAtual < 1){
            $mesAtual = 12;
            $anoAtual--;
        }
        $agendaValida = $this->verificarAgendaBarbeiro($mesAtual,$anoAtual);

        if ($agendaValida){
            $this->mesAnterior = true;
            $this->proximoMes = true;
            $this->mesAtual = $mesAtual;
            $this->anoAtual = $anoAtual;
            $this->buscarAgendaBarbeiro($this->mesAtual,$this->anoAtual);
        }else{
            $this->mesAnterior = false;
        }

    }

    public function bloquearDia(){
        $dia = AgendaDia::find($this->diaSelecionado);
        if ($dia === null){
            return;
        }
        if ($dia){
            $dia->disponibilidade = 0;
            $dia->save();


            //bloquea também todos os horarios deste dia
            $horarios = AgendaDiaHorario::where('agenda_dia_id',$dia->id)->get();
            foreach ($horarios as $horario){
                $horario->disponibilidade = 0;
                $horario->save();
            }
            $this->carregarDiasDisponiveis();
            $this->buscarAgendaBarbeiro($this->mesAtual,$this->anoAtual);
            $this->carregarHorariosDisponiveis();
            $this->horarioSelecionado = 0;
            $this->diaSelecionado = 0;

        }
    }

    public function desbloquearDia(){
        $dia = AgendaDia::find($this->diaSelecionado);
        if ($dia === null){
            return;
        }
        if ($dia){
            $dia->disponibilidade = 1;
            $dia->save();

            //desbloquea também todos os horarios deste dia
            $horarios = AgendaDiaHorario::where('agenda_dia_id',$dia->id)->get();
            foreach ($horarios as $horario){
                $horario->disponibilidade = 1;
                $horario->save();
            }
            $this->carregarDiasDisponiveis();
            $this->buscarAgendaBarbeiro($this->mesAtual,$this->anoAtual);
            $this->carregarHorariosDisponiveis();
            $this->horarioSelecionado = 0;
            $this->diaSelecionado = 0;
        }
    }

    public function bloquearHorario(){
        $horario = AgendaDiaHorario::find($this->horarioSelecionado);
        if ($horario === null || $horario->disponibilidade === 0){
            return;
        }

        if ($horario){
            $horario->disponibilidade = 0;
            $horario->save();
            $this->horarioSelecionado = 0;
            $this->carregarHorariosDisponiveis();
        }
    }

    public function desbloquearHorario(){
        $horario = AgendaDiaHorario::find($this->horarioSelecionado);
        if ($horario === null || $horario->disponibilidade === 1){
            return;
        }
        //busca o dia referente a este horario para saber se está bloqueado
        $dia = AgendaDia::find($horario->agenda_dia_id);
        if ($dia->disponibilidade === 0){
            $this->addError('horarioSelecionado', 'Ops! Este horário está indisponível pois o dia está bloqueado.');
            return;
        }
        if ($horario){
            $horario->disponibilidade = 1;
            $horario->save();
            $this->horarioSelecionado = 0;
            $this->carregarHorariosDisponiveis();
        }
    }

    public function render()
    {
        return view('livewire.agendamento-restrita');
    }
}
