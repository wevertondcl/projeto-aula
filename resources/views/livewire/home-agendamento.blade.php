<div>
    <nav aria-label="Progress">
        <ol role="list" class="divide-y divide-gray-300 rounded-md border border-gray-300 md:flex md:divide-y-0">

            <li class="relative md:flex md:flex-1" wire:click="mudarPasso(1)">

                @if($passoAtual === 1 && $passoUmCompleto)
                    <x-navbar-item-selecionado-completo titulo="Passo 1"/>
                @endif

                @if($passoAtual === 1 && !$passoUmCompleto)
                    <x-navbar-item-incompleto numero="01" titulo="Passo 1"/>
                @endif

                @if($passoAtual !== 1 && $passoUmCompleto)
                    <x-navbar-item-completo titulo="Passo 1"/>
                @endif


                <!-- Arrow separator for lg screens and up -->
                <div class="absolute right-0 top-0 hidden h-full w-5 md:block" aria-hidden="true">
                    <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
                        <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor" stroke-linejoin="round" />
                    </svg>
                </div>
            </li>

            <li class="relative md:flex md:flex-1" wire:click="avancarPassoDois(true)">

                @if($passoAtual === 2 && $passoDoisCompleto)
                    <x-navbar-item-selecionado-completo titulo="Passo 2"/>
                @endif

                @if($passoAtual === 2 && !$passoDoisCompleto)
                    <x-navbar-item-incompleto numero="02" titulo="Passo 2"/>
                @endif

                @if($passoAtual !== 2 && $passoDoisCompleto)
                    <x-navbar-item-completo titulo="Passo 2"/>
                @endif

                @if($passoAtual !== 2 && !$passoDoisCompleto)
                    <x-navbar-item-passo numero="02" titulo="Passo 2" />
                @endif

                <!-- Arrow separator for lg screens and up -->
                <div class="absolute right-0 top-0 hidden h-full w-5 md:block" aria-hidden="true">
                    <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
                        <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor" stroke-linejoin="round" />
                    </svg>
                </div>
            </li>

            <li class="relative md:flex md:flex-1" wire:click="avancarPassoTres(true)">
                @if($passoAtual === 3 && $passoTresCompleto)
                    <x-navbar-item-selecionado-completo titulo="Passo 3"/>
                @endif

                @if($passoAtual === 3 && !$passoTresCompleto)
                    <x-navbar-item-incompleto numero="03" titulo="Passo 3"/>
                @endif

                @if($passoAtual !== 3 && $passoTresCompleto)
                    <x-navbar-item-completo titulo="Passo 3"/>
                @endif

                @if($passoAtual !== 3 && !$passoTresCompleto)
                    <x-navbar-item-passo numero="03" titulo="Passo 3" />
                @endif
            </li>

        </ol>
    </nav>

    <div class="mt-16">
        @if($passoAtual === 1)
            <div class="flex flex-col w-full mx-auto max-w-sm justify-center p-6 border border-gray-300 rounded-2xl">
                <h2 class="text-lg font-bold text-indigo-600">Identificação</h2>

                <form class="mt-5 space-y-6" wire:submit="avancarPassoDois(true)" x-data="{}">

                    <x-input-text-default label="Nome" campo="nome" :erros="$errors" type="text" placeholder="Digite seu nome" />
                    <x-input-text-default label="E-mail" campo="email" :erros="$errors" type="email" placeholder="Digite seu e-mail" />


                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2
                        focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Avançar</button>
                    </div>
                </form>

            </div>
        @endif
        @if($passoAtual === 2)
                <div class="flex flex-col w-full mx-auto max-w-sm justify-center p-6 border border-gray-300 rounded-2xl">
                    <h2 class="text-lg font-bold text-indigo-600">{{$nome}}, escolha os procedimentos</h2>

                    <form class="mt-5 space-y-6" wire:submit="avancarPassoTres(true)">
                        <fieldset>
                            <legend class="sr-only">Notifications</legend>
                            <div class="space-y-5">

                                <div class="relative flex items-start">
                                    <div class="flex h-6 items-center">
                                        <input wire:model.live.debounce.600ms="corte" value="true" id="comments" aria-describedby="comments-description" name="comments" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600
                                        focus:ring-indigo-600">
                                    </div>
                                    <div class="ml-3 text-sm leading-6">
                                        <label for="comments" class="font-medium text-gray-900">Corte</label>
                                    </div>
                                </div>

                                <div class="relative flex items-start">
                                    <div class="flex h-6 items-center">
                                        <input wire:model.live.debounce.600ms="barba" id="candidates" value="true" aria-describedby="candidates-description" name="candidates" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600
                                        focus:ring-indigo-600">
                                    </div>
                                    <div class="ml-3 text-sm leading-6">
                                        <label for="candidates" class="font-medium text-gray-900">Barba</label>
                                    </div>
                                </div>

                                <div class="relative flex items-start">
                                    <div class="flex h-6 items-center">
                                        <input wire:model.live.debounce.600ms="sobrancelha" id="offers" value="true" aria-describedby="offers-description" name="offers" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600
                                        focus:ring-indigo-600">
                                    </div>
                                    <div class="ml-3 text-sm leading-6">
                                        <label for="offers" class="font-medium text-gray-900">Sobrancelha</label>
                                    </div>
                                </div>

                            </div>
                        </fieldset>

                        <div>
                            @if($errors)
                                @foreach($errors->all() as $index => $error)
                                    <p class="text-red-500" wire:key="errors-passo-dois-{{$index}}">{{$error}}</p>
                                @endforeach
                            @endif
                        </div>

                        <div>
                            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2
                            focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Avançar</button>
                        </div>
                    </form>

                    <button type="button" wire:click="mudarPasso(1)"  class="mt-10 rounded bg-white px-2 py-1 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Voltar</button>

                </div>

        @endif
        @if($passoAtual === 3)
                <div class="flex flex-col w-full mx-auto max-w-3xl justify-center p-6 border border-gray-300 rounded-2xl">
                    <h2 class="text-lg font-bold text-indigo-600">{{$nome}}, escolha o dia e horário</h2>
                    <x-calendario-agendamento :dias-agenda="$agenda" :horarios-disponiveis="$horariosDisponiveis" :horario-selecionado="$horarioSelecionado" :dia-selecionado="$diaSelecionado" :dados-dia-selecionado="$dadosDiaSelecionado"/>
                </div>

        @endif
        @if($passoAtual === 4)
                <div class="flex flex-col w-full mx-auto max-w-sm justify-center p-6 border border-gray-300 rounded-2xl">
                    <h2 class="text-lg font-bold text-indigo-600">{{$nome}}, agendamento realizado!</h2>
                    <div class="flex justify-center max-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-20 w-20 text-green-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>

                    </div>
                </div>
        @endif

    </div>

</div>

