<div>
    <header>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Agenda</h1>
        </div>
    </header>
    <main>

        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

            <div class="flex flex-col w-full max-w-3xl justify-center p-6 border border-gray-300 rounded-2xl">
                <div class="border-b border-gray-200 pb-5 sm:flex sm:items-center sm:justify-between">
                    <h3 class="text-base font-semibold text-gray-900">Administrar agenda</h3>
                    <div class="mt-3 flex sm:mt-0 sm:ml-4">
                        <button type="button" class="ml-3 inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2
                        focus-visible:outline-indigo-600" wire:click="adicionarMes">Adicionar mês</button>
                    </div>
                </div>


                <x-calendario-agendamento-restrita :dias-agenda="$agenda" :horarios-disponiveis="$horariosDisponiveis" :horario-selecionado="$horarioSelecionado" :dia-selecionado="$diaSelecionado" :dados-dia-selecionado="$dadosDiaSelecionado"
                                                   :proximo-mes="$proximoMes" :mes-anterior="$mesAnterior"/>
            </div>
        </div>
    </main>
</div>
