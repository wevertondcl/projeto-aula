<?php

namespace App\Livewire;

use Livewire\Component;

class HomeAgendamento extends Component
{
    public $passoAtual = 1;
    public $nome = '';
    public $email = '';

    public bool $corte = false;
    public bool $barba = false;
    public bool $sobrancelha = false;

    public string $diaSelecionado = '';
    public int $horarioSelecionado = 0;

    public $diasDisponiveis = [
       'domingo' => [
           'nome' => 'Domingo',
           'disponibilidade' => false
       ],
       'segunda' => [
           'nome' => 'Segunda-feira',
           'disponibilidade' => true
       ],
        'terca' => [
          'nome' => 'Terça-feira',
          'disponibilidade' => true
        ],
        'quarta' => [
          'nome' => 'Quarta-feira',
          'disponibilidade' => true
        ],
        'quinta' => [
          'nome' => 'Quinta-feira',
          'disponibilidade' => true
        ],
        'sexta' => [
          'nome' => 'Sexta-feira',
          'disponibilidade' => true
        ],
        'sabado' => [
          'nome' => 'Sábado',
          'disponibilidade' => false
        ],
    ];

    public $horariosDisponiveis = [
        'segunda' => [
            [
                'id' => 1,
                'horario' => '08:00',
                'disponibilidade' => true
            ],
            [
                'id' => 2,
                'horario' => '09:00',
                'disponibilidade' => true
            ],
            [
                'id' => 3,
                'horario' => '10:00',
                'disponibilidade' => false
            ],
        ],
        'terca' => [
            [
                'id' => 200,
                'horario' => '08:00',
                'disponibilidade' => false
            ],
            [
                'id' => 201,
                'horario' => '09:00',
                'disponibilidade' => true
            ],
            [
                'id' => 205,
                'horario' => '10:00',
                'disponibilidade' => true
            ],
        ],
        'quarta' => [
            [
                'id' => 300,
                'horario' => '14:00',
                'disponibilidade' => false
            ],
            [
                'id' => 301,
                'horario' => '16:00',
                'disponibilidade' => true
            ],
            [
                'id' => 305,
                'horario' => '20:00',
                'disponibilidade' => true
            ],
        ],
        'quinta' => [
            [
                'id' => 400,
                'horario' => '12:00',
                'disponibilidade' => false
            ],
            [
                'id' => 401,
                'horario' => '13:00',
                'disponibilidade' => true
            ],
            [
                'id' => 405,
                'horario' => '15:00',
                'disponibilidade' => true
            ],
        ],
        'sexta' => [
            [
                'id' => 700,
                'horario' => '09:00',
                'disponibilidade' => false
            ],
            [
                'id' => 701,
                'horario' => '11:00',
                'disponibilidade' => true
            ],
            [
                'id' => 702,
                'horario' => '10:00',
                'disponibilidade' => true
            ],
        ]
    ];

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

    public function updated($variavel)
    {
       if (str_starts_with($variavel,'diaSelecionado')){
           $this->horarioSelecionado = 0;
       }

        if ($variavel === 'nome'){
            $this->validate([
                'nome' => 'required|min:10',
            ]);
        }

        if ($variavel === 'email'){
            $this->validate([
                'email' => 'required|email',
            ]);
        }

    }

    public function mudarPasso($passo = 1)
    {
        $this->passoAtual = $passo;
    }
    public function avancarPassoDois(){
        $this->validate([
            'nome' => 'required|min:10',
            'email' => 'required|email',
        ]);

        $this->passoAtual = 2;
    }

    public function avancarPassoTres(){
        $this->validate([
            'nome' => 'required|min:10',
            'email' => 'required|email',
            'corte' => 'required|boolean',
            'barba' => 'required|boolean',
            'sobrancelha' => 'required|boolean',
        ]);
        if (!$this->validarProcedimentos()){
            return;
        }

        $this->passoAtual = 3;
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
            'diaSelecionado' => 'required|string|in:domingo,segunda,terca,quarta,quinta,sexta,sabado',
            'horarioSelecionado' => 'required|integer'
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
        $encontrado = array_filter($this->horariosDisponiveis[$this->diaSelecionado], function($horario) {
            return $horario['id'] === $this->horarioSelecionado && $horario['disponibilidade'] === true;
        });

        if (empty($encontrado)) {
            $this->addError('horarioSelecionado', 'Horário indisponível');
            return;
        }

        $this->passoAtual = 4;

    }

    public function validarProcedimentos()
    {
        if (!$this->corte && !$this->barba && !$this->sobrancelha){
            $this->addError('corte','Selecione ao menos um serviço');
            return false;
        }
        return true;

    }
    public function render()
    {
        return view('livewire.home-agendamento');
    }
}
