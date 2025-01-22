<?php

namespace App\Livewire;

use App\Models\Agenda;
use App\Models\AgendaDia;

use App\Models\AgendaDiaHorario;
use App\Models\AgendaDiaHorarioAgendado;
use Livewire\Component;

class HomeAgendamento extends Component
{
    public $passoAtual = 1;
    public $nome = '';
    public $email = '';

    public bool $corte = false;
    public bool $barba = false;
    public bool $sobrancelha = false;

    public int $diaSelecionado = 0;
    public $dadosDiaSelecionado = [];
    public int $horarioSelecionado = 0;

    public bool $passoUmCompleto = false;
    public bool $passoDoisCompleto = false;
    public bool $passoTresCompleto = false;

    public $diasDisponiveis = [];
    public $horariosDisponiveis = [];

    public $barbeiroSelecionado = 1;
    public $agenda = [];

    public $mesAtual = '';
    public $anoAtual = '';

    public bool $proximoMes = true;
    public bool $mesAnterior = true;

    public function mount()
    {
        $this->barbeiroSelecionado = 1;
        //$this->carregarDiasDisponiveis();

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


    public function messages(){
        return [
          //'nome.required' => 'Nome é obrigatório',
        ];
    }

    public function validationAttributes(){
        return [
            'nome' => 'Nome',
            'email' => 'E-mail',
            'diaSelecionado' => 'Dia do agendamento',
            'horarioSelecionado' => 'Horário do agendamento'
        ];
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

    public function updated($variavel)
    {
        /*
       if (str_starts_with($variavel,'diaSelecionado')){
          $this->alterarDiaSelecionado();
       }
        */

        if ($variavel === 'nome'){
            $this->avancarPassoDois();
        }

        if ($variavel === 'email'){
            $this->avancarPassoDois();
        }

        if ($variavel === 'corte' || $variavel === 'barba' || $variavel === 'sobrancelha'){
            $this->avancarPassoTres();
        }

    }

    public function mudarPasso($passo = 1)
    {
        $this->passoAtual = $passo;
    }
    public function avancarPassoDois($avancarPagina = false){
        $this->passoUmCompleto = false;
        $this->validate([
            'nome' => 'required|min:10',
            'email' => 'required|email',
        ]);
        $this->passoUmCompleto = true;
        if ($avancarPagina){
            $this->passoAtual = 2;
        }

    }

    public function avancarPassoTres($avancarPagina = false){

        $this->validate([
            'nome' => 'required|min:10',
            'email' => 'required|email',
            'corte' => 'required|boolean',
            'barba' => 'required|boolean',
            'sobrancelha' => 'required|boolean',
        ]);
        if (!$this->validarProcedimentos()){
            $this->passoDoisCompleto = false;
            return;
        }
        $this->passoDoisCompleto = true;

        if ($avancarPagina){
            $this->passoAtual = 3;
        }
        //dd($this->corte, $this->barba, $this->sobrancelha);
    }

    public function finalizarAgendamento()
    {
        $this->validate([
            'nome' => 'required|min:10',
            'email' => 'required|email',
            'corte' => 'required|boolean',
            'barba' => 'required|boolean',
            'sobrancelha' => 'required|boolean',
            'diaSelecionado' => 'required|integer|exists:agenda_dias,id',
            'horarioSelecionado' => 'required|integer|exists:agenda_dia_horarios,id',
        ]);

        if (!$this->validarProcedimentos()){
            $this->passoAtual = 2;
            return;
        }

        if (!$this->horarioSelecionado) {
            $this->addError('horarioSelecionado', 'Você deve selecionar um horário');
            return;
        }

        // Filtrar o array para encontrar o item com o 'id' desejado e verificar se 'status' é true
        $encontrado = array_filter($this->horariosDisponiveis, function($horario) {
            return $horario['id'] === $this->horarioSelecionado && $horario['disponibilidade'] === true;
        });

        if (empty($encontrado)) {
            $this->addError('horarioSelecionado', 'Horário indisponível');
            return;
        }
        $this->salvarAgendamento();



    }

    public function salvarAgendamento()
    {
        $verificacaoHorario  = AgendaDiaHorario::where('id',$this->horarioSelecionado)
            ->where('disponibilidade',1)
            ->first();

        if ($verificacaoHorario) {
            $gravacao = AgendaDiaHorarioAgendado::create([
                'agenda_dia_horario_id' => $this->horarioSelecionado,
                'nome' => $this->nome,
                'email' => $this->email,

                'corte' => $this->corte,
                'barba' => $this->barba,
                'sobrancelha' => $this->sobrancelha,
            ]);

                AgendaDiaHorario::where('id',$this->horarioSelecionado)
                ->update([
                    'disponibilidade' => 0 // false
                ]);

            if ($gravacao) {
                $this->passoTresCompleto = true;
                $this->passoAtual = 4;

                $this->carregarDiasDisponiveis();
                $this->buscarAgendaBarbeiro($this->mesAtual,$this->anoAtual);
                //$this->reset('nome','email','corte','barba','sobrancelha','diaSelecionado','horarioSelecionado');
            } else {
                $this->addError('horarioSelecionado','Ops! este horário está bloqueado, selecione outra opção!');
            }
        }else{
            $this->addError('horarioSelecionado','Ops! Alguém já pegou esse horário, selecione outra opção!');
        }

    }

    public function validarProcedimentos()
    {
        if (!$this->corte && !$this->barba && !$this->sobrancelha){
            $this->addError('corte','Selecione ao menos um serviço');
            return false;
        }
        return true;

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

    public function render()
    {
        return view('livewire.home-agendamento');
    }
}
