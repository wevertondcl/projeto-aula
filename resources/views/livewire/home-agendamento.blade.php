<div>
    <nav aria-label="Progress">
        <ol role="list" class="divide-y divide-gray-300 rounded-md border border-gray-300 md:flex md:divide-y-0">

            <li class="relative md:flex md:flex-1" wire:click="mudarPasso(1)">

                @if($passoAtual === 1 && $passoUmCompleto)
                    <a href="#" class="group flex w-full items-center">

                        <span class="flex items-center px-6 py-4 text-sm font-medium">
                            <span class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-indigo-600 group-hover:bg-indigo-800">
                                <svg class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 0 1 .208 1.04l-9 13.5a.75.75 0 0 1-1.154.114l-6-6a.75.75 0 0 1 1.06-1.06l5.353 5.353 8.493-12.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd" />
                                </svg>
                            </span>
                            <span class="ml-4 text-sm font-medium text-gray-900">Passo 1</span>
                        </span>

                    </a>
                @endif

                @if($passoAtual === 1 && !$passoUmCompleto)
                    <a href="#" class="flex items-center px-6 py-4 text-sm font-medium" aria-current="step">

                        <span class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 border-indigo-600">
                            <span class="text-indigo-600">01</span>
                        </span>
                        <span class="ml-4 text-sm font-medium text-indigo-600">Passo 1</span>

                    </a>
                @endif

                @if($passoAtual !== 1 && $passoUmCompleto)
                    <a href="#" class="group flex w-full items-center">

                        <span class="flex items-center px-6 py-4 text-sm font-medium">
                            <span class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-indigo-600 group-hover:bg-indigo-800">
                                <svg class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 0 1 .208 1.04l-9 13.5a.75.75 0 0 1-1.154.114l-6-6a.75.75 0 0 1 1.06-1.06l5.353 5.353 8.493-12.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd" />
                                </svg>
                            </span>
                            <span class="ml-4 text-sm font-medium text-gray-900">Passo 1</span>
                        </span>

                    </a>
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
                    <a href="#" class="group flex w-full items-center">

                        <span class="flex items-center px-6 py-4 text-sm font-medium">
                            <span class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-indigo-600 group-hover:bg-indigo-800">
                                <svg class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 0 1 .208 1.04l-9 13.5a.75.75 0 0 1-1.154.114l-6-6a.75.75 0 0 1 1.06-1.06l5.353 5.353 8.493-12.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd" />
                                </svg>
                            </span>
                            <span class="ml-4 text-sm font-medium text-gray-900">Passo 2</span>
                        </span>

                    </a>
                @endif

                @if($passoAtual === 2 && !$passoDoisCompleto)
                    <a href="#" class="flex items-center px-6 py-4 text-sm font-medium" aria-current="step">

                        <span class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 border-indigo-600">
                            <span class="text-indigo-600">02</span>
                        </span>
                        <span class="ml-4 text-sm font-medium text-indigo-600">Passo 2</span>

                    </a>
                @endif

                @if($passoAtual !== 2 && $passoDoisCompleto)
                    <a href="#" class="group flex w-full items-center">

                        <span class="flex items-center px-6 py-4 text-sm font-medium">
                            <span class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-indigo-600 group-hover:bg-indigo-800">
                                <svg class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 0 1 .208 1.04l-9 13.5a.75.75 0 0 1-1.154.114l-6-6a.75.75 0 0 1 1.06-1.06l5.353 5.353 8.493-12.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd" />
                                </svg>
                            </span>
                            <span class="ml-4 text-sm font-medium text-gray-900">Passo 2</span>
                        </span>

                    </a>
                @endif

                @if($passoAtual !== 2 && !$passoDoisCompleto)
                    <a href="#" class="group flex items-center">

                        <span class="flex items-center px-6 py-4 text-sm font-medium">
                            <span class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 border-gray-300 group-hover:border-gray-400">
                                <span class="text-gray-500 group-hover:text-gray-900">02</span>
                            </span>
                            <span class="ml-4 text-sm font-medium text-gray-500 group-hover:text-gray-900">Passo 2</span>
                        </span>

                    </a>
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
                    <a href="#" class="group flex w-full items-center">

                        <span class="flex items-center px-6 py-4 text-sm font-medium">
                            <span class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-indigo-600 group-hover:bg-indigo-800">
                                <svg class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 0 1 .208 1.04l-9 13.5a.75.75 0 0 1-1.154.114l-6-6a.75.75 0 0 1 1.06-1.06l5.353 5.353 8.493-12.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd" />
                                </svg>
                            </span>
                            <span class="ml-4 text-sm font-medium text-gray-900">Passo 3</span>
                        </span>

                    </a>
                @endif

                @if($passoAtual === 3 && !$passoTresCompleto)
                    <a href="#" class="flex items-center px-6 py-4 text-sm font-medium" aria-current="step">

                        <span class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 border-indigo-600">
                            <span class="text-indigo-600">03</span>
                        </span>
                        <span class="ml-4 text-sm font-medium text-indigo-600">Passo 3</span>

                    </a>
                @endif

                @if($passoAtual !== 3 && $passoTresCompleto)
                    <a href="#" class="group flex w-full items-center">

                        <span class="flex items-center px-6 py-4 text-sm font-medium">
                            <span class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-indigo-600 group-hover:bg-indigo-800">
                                <svg class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 0 1 .208 1.04l-9 13.5a.75.75 0 0 1-1.154.114l-6-6a.75.75 0 0 1 1.06-1.06l5.353 5.353 8.493-12.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd" />
                                </svg>
                            </span>
                            <span class="ml-4 text-sm font-medium text-gray-900">Passo 3</span>
                        </span>

                    </a>
                @endif

                @if($passoAtual !== 3 && !$passoTresCompleto)
                    <a href="#" class="group flex items-center">

                        <span class="flex items-center px-6 py-4 text-sm font-medium">
                            <span class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 border-gray-300 group-hover:border-gray-400">
                                <span class="text-gray-500 group-hover:text-gray-900">03</span>
                            </span>
                            <span class="ml-4 text-sm font-medium text-gray-500 group-hover:text-gray-900">Passo 3</span>
                        </span>

                    </a>
                @endif
            </li>

        </ol>
    </nav>

    <div class="mt-16">
        @if($passoAtual === 1)
            <div class="flex flex-col w-full mx-auto max-w-sm justify-center p-6 border border-gray-300 rounded-2xl">
                <h2 class="text-lg font-bold text-indigo-600">Identificação</h2>

                <form class="mt-5 space-y-6" wire:submit="avancarPassoDois(true)">

                    <div>
                        <label for="nome" class="block text-sm font-medium leading-6 text-gray-900">Nome</label>
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <input wire:model.live.debounce.600ms="nome" type="text" name="nome" id="nome"
                                   @class([
                                        'block w-full rounded-md border-0 py-1.5 pr-10 text-red-900 ring-1 ring-inset ring-red-300 placeholder:text-red-300 focus:ring-2 focus:ring-inset
                                        focus:ring-red-500  sm:text-sm sm:leading-6' => $errors->has('nome'),
                                        'block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400
                                        focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6' => !$errors->has('nome')
                                    ])
                                   placeholder="Digite seu nome" aria-invalid="true" aria-describedby="nome-error">
                                @if($errors->has('nome'))
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                        <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-8-5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-1.5 0v-4.5A.75.75 0 0 1 10 5Zm0 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                @endif
                        </div>
                        @if($errors->has('nome'))
                            <p class="mt-2 text-sm text-red-600" id="email-error">{{$errors->first('nome')}}</p>
                        @endif
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">E-mail</label>
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <input wire:model.live.debounce.600ms="email" type="email" name="email" id="email"
                                   @class([
                                        'block w-full rounded-md border-0 py-1.5 pr-10 text-red-900 ring-1 ring-inset ring-red-300 placeholder:text-red-300 focus:ring-2 focus:ring-inset
                                        focus:ring-red-500  sm:text-sm sm:leading-6' => $errors->has('email'),
                                        'block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400
                                        focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6' => !$errors->has('email')
                                    ])
                                   placeholder="Digite seu e-mail" aria-invalid="true" aria-describedby="email-error">
                            @if($errors->has('email'))
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-8-5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-1.5 0v-4.5A.75.75 0 0 1 10 5Zm0 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            @endif
                        </div>
                        @if($errors->has('email'))
                            <p class="mt-2 text-sm text-red-600" id="email-error">{{$errors->first('email')}}</p>
                        @endif
                    </div>


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
                <div class="flex flex-col w-full mx-auto max-w-sm justify-center p-6 border border-gray-300 rounded-2xl">
                    <h2 class="text-lg font-bold text-indigo-600">{{$nome}}, escolha o dia e horário</h2>

                    <form class="mt-5 space-y-6" wire:submit="finalizarAgendamento">
                        <fieldset aria-label="Choose a memory option">
                            <div class="flex items-center justify-between">
                                <div class="text-sm font-medium leading-6 text-gray-900">Dias disponíveis</div>
                            </div>

                            <div class="mt-2 grid grid-cols-3 gap-3">
                                @foreach($diasDisponiveis as $chave => $dia)
                                    <label
                                           @class([
                                                'flex items-center justify-center rounded-md px-3 py-3 text-xs font-semibold uppercase focus:outline-none sm:flex-1' => true,
                                                'cursor-pointer' => $dia['disponibilidade'] === true,
                                                'cursor-not-allowed opacity-25 ring-inset ring-1 ring-gray-300 bg-white text-gray-900' => $dia['disponibilidade'] === false,
                                                'ring-indigo-600 ring-offset-2 ring-0 bg-indigo-600 text-white hover:bg-indigo-500' => $diaSelecionado === $chave,
                                                'ring-1 ring-gray-300 bg-white text-gray-900 hover:bg-gray-50' => $diaSelecionado !== $chave && $dia['disponibilidade'] === true,

                                            ])
                                        wire:key="dia-agendamento-{{$chave}}"
                                    >
                                        <input wire:model.live="diaSelecionado" type="radio" name="memory-option" value="{{$chave}}" class="sr-only" @disabled($dia['disponibilidade'] === false)>
                                        <span>{{$dia['nome']}}</span>
                                    </label>
                                @endforeach
                            </div>
                        </fieldset>

                        <fieldset aria-label="Choose a memory option">
                            <div class="flex items-center justify-between">
                                <div class="text-sm font-medium leading-6 text-gray-900">Horários disponíveis</div>
                            </div>

                            <div class="mt-2 grid grid-cols-3 gap-3">
                                @foreach($horariosDisponiveis as $chave => $horario)
                                    @if($chave === $diaSelecionado)
                                        @foreach($horario as $key => $opcao)
                                            <label
                                                    @class([
                                                         'flex items-center justify-center rounded-md px-3 py-3 text-xs font-semibold uppercase focus:outline-none sm:flex-1' => true,
                                                         'cursor-pointer' => $opcao['disponibilidade'] === true,
                                                         'cursor-not-allowed opacity-25 ring-inset ring-1 ring-gray-300 bg-white text-gray-900' => $opcao['disponibilidade'] === false,
                                                         'ring-indigo-600 ring-offset-2 ring-0 bg-indigo-600 text-white hover:bg-indigo-500' => $horarioSelecionado === $opcao['id'],
                                                         'ring-1 ring-gray-300 bg-white text-gray-900 hover:bg-gray-50' => $horarioSelecionado !== $opcao['id'] && $opcao['disponibilidade'] === true,

                                                     ])
                                                wire:key="horario-agendamento-{{$chave}}-{{$opcao['id']}}"
                                            >
                                                <input wire:model.live="horarioSelecionado" type="radio" name="opcoes-horario" value="{{$opcao['id']}}" class="sr-only" @disabled($opcao['disponibilidade'] === false)>
                                                <span>{{$opcao['horario']}}</span>
                                            </label>
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>
                        </fieldset>

                        <div>
                            @if($errors)
                                @foreach($errors->all() as $index => $error)
                                    <p class="text-red-500" wire:key="errors-passo-tres-{{$index}}">{{$error}}</p>
                                @endforeach
                            @endif
                        </div>

                        <div>
                            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2
                            focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Finalizar</button>
                        </div>
                    </form>

                    <button type="button" wire:click="mudarPasso(2)"  class="mt-10 rounded bg-white px-2 py-1 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Voltar</button>
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

