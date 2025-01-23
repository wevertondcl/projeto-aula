@props(['diasAgenda', 'horariosDisponiveis', 'horarioSelecionado','diaSelecionado', 'dadosDiaSelecionado','proximoMes', 'mesAnterior'])
@if(sizeof($diasAgenda) == 0)
    <div class="mt-8 mx-auto">
        <p class="text-red-500 font-bold">Sua agenda está vazia!</p>
    </div>
@else

    <div>
        <div {{ $attributes->class(['']) }}>
            <form class="mt-5 space-y-6">
                <div class="md:grid md:grid-cols-2 md:divide-x md:divide-gray-200">
                    <div class="md:pr-14">
                        <div class="flex items-center">
                            <h2 class="flex-auto text-sm font-semibold text-gray-900">{{ucfirst($diasAgenda[0]->dia->monthName).' '.$diasAgenda[0]->dia->year}} </h2>
                            <button type="button" wire:click="voltarMes"
                                @class([
                                    '-my-1.5 flex flex-none items-center justify-center p-1.5',
                                    'cursor-pointer text-gray-400 hover:text-gray-500' => $mesAnterior,
                                    'cursor-not-allowed text-gray-200' => !$mesAnterior,
                                ])>
                                <span class="sr-only">Mês anterior</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd" d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                            <button type="button" wire:click="avancarMes"
                                @class([
                                    '-my-1.5 flex flex-none items-center justify-center p-1.5',
                                    'cursor-pointer text-gray-400 hover:text-gray-500' => $proximoMes,
                                    'cursor-not-allowed text-gray-200' => !$proximoMes,
                                ])>
                                <span class="sr-only">Próximo mês</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </div>
                        <div class="flex gap-2 mt-5">
                            <button type="button" class="rounded-md bg-red-50 px-2.5 py-1.5 text-sm font-semibold text-red-600 shadow-xs hover:bg-red-100"
                            wire:click="bloquearDia">Bloquear</button>
                            <button type="button" class="rounded-md bg-indigo-50 px-2.5 py-1.5 text-sm font-semibold text-indigo-600 shadow-xs hover:bg-indigo-100"
                                    wire:click="desbloquearDia">Desbloquear</button>
                        </div>
                        <div class="mt-5 grid grid-cols-7 text-center text-xs/6 text-gray-500">
                            <div>Dom</div>
                            <div>Seg</div>
                            <div>Ter</div>
                            <div>Qua</div>
                            <div>Qui</div>
                            <div>Sex</div>
                            <div>Sab</div>
                        </div>
                        <div class="mt-2 grid grid-cols-7 text-sm">
                            @for($i = 0; $i < $diasAgenda[0]->dia->dayOfWeek; $i++)
                                <div class="py-2" wire:key="dia-mes-anterior-{{$i}}-{{$diasAgenda[0]->dia->day}}">
                                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-400 cursor-not-allowed">
                                        <span>-</span>
                                    </button>

                                </div>
                            @endfor

                            @foreach($diasAgenda as $index => $data)
                                <div class="py-2" wire:key="dia-mes-atual-{{$data->id}}">
                                    <button wire:click="alterarDiaSelecionado({{$data->id}})" type="button"
                                        @class([
                                           'mx-auto flex h-8 w-8 items-center justify-center rounded-full',
                                           'text-gray-900' => $data->disponibilidade == true,
                                           'text-gray-400' => $data->disponibilidade == false,
                                           'bg-gray-900 font-semibold text-white' => $diaSelecionado === $data->id,
                                           'text-gray-900 hover:bg-gray-200' => $diaSelecionado !== $data->id && $data->disponibilidade == true,

                                       ])
                                    >
                                        <time datetime="{{ $data->dia->format('Y-m-d') }}">{{ $data->dia->format('d') }}</time>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <section class="mt-12 md:mt-0 md:pl-14">
                        <h2 class="text-base font-semibold text-gray-900">
                            @if($dadosDiaSelecionado)
                                <div>Horários do dia: {{$dadosDiaSelecionado->dia->day .' de '. $dadosDiaSelecionado->dia->monthName .' de '. $dadosDiaSelecionado->dia->year}}</div>
                            @else
                                <div>Selecione um dia para ver os horários</div>
                            @endif
                        </h2>
                        <div class="flex gap-2 mt-5">
                            <button type="button" class="rounded-md bg-red-50 px-2.5 py-1.5 text-sm font-semibold text-red-600 shadow-xs hover:bg-red-100"
                                    wire:click="bloquearHorario">Bloquear</button>
                            <button type="button" class="rounded-md bg-indigo-50 px-2.5 py-1.5 text-sm font-semibold text-indigo-600 shadow-xs hover:bg-indigo-100"
                                    wire:click="desbloquearHorario">Desbloquear</button>
                        </div>
                        <div class="mt-5 grid grid-cols-4 gap-3">
                            @foreach($horariosDisponiveis as $key => $opcao)
                                <label
                                    @class([
                                         'flex items-center justify-center rounded-md px-3 py-3 text-xs font-semibold uppercase focus:outline-none sm:flex-1' => true,
                                         'cursor-pointer' => $opcao['disponibilidade'] === true,
                                         'opacity-25 ring-inset ring-1 ring-gray-300 bg-white text-gray-900' => $opcao['disponibilidade'] === false && $horarioSelecionado !== $opcao['id'],
                                         'ring-indigo-600 ring-offset-2 ring-0 bg-indigo-600 text-white hover:bg-indigo-500' => $horarioSelecionado === $opcao['id'],
                                         'ring-1 ring-gray-300 bg-white text-gray-900 hover:bg-gray-50' => $horarioSelecionado !== $opcao['id'] && $opcao['disponibilidade'] === true,

                                     ])
                                    wire:key="horario-agendamento-{{$opcao['id']}}"
                                >
                                    <input wire:model.live="horarioSelecionado" type="radio" name="opcoes-horario" value="{{$opcao['id']}}" class="sr-only">
                                    <span>{{$opcao['horario']}}</span>
                                </label>
                            @endforeach
                        </div>
                    </section>
                </div>


                <div class="mt-8 mx-auto">
                    @if($errors)
                        @foreach($errors->all() as $index => $error)
                            <p class="text-red-500" wire:key="errors-passo-tres-{{$index}}">{{$error}}</p>
                        @endforeach
                    @endif
                </div>
            </form>
        </div>

    </div>
@endif
