<div>
    <nav aria-label="Progress">
        <ol role="list" class="divide-y divide-gray-300 rounded-md border border-gray-300 md:flex md:divide-y-0">
            <li class="relative md:flex md:flex-1" wire:click="mudarPasso(1)">
                <!-- Completed Step -->
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
                <!-- Arrow separator for lg screens and up -->
                <div class="absolute right-0 top-0 hidden h-full w-5 md:block" aria-hidden="true">
                    <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
                        <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor" stroke-linejoin="round" />
                    </svg>
                </div>
            </li>

            <li class="relative md:flex md:flex-1" wire:click="mudarPasso(2)">
                <!-- Current Step -->
                <a href="#" class="flex items-center px-6 py-4 text-sm font-medium" aria-current="step">
                <span class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 border-indigo-600">
                  <span class="text-indigo-600">02</span>
                </span>
                    <span class="ml-4 text-sm font-medium text-indigo-600">Passo 2</span>
                </a>
                <!-- Arrow separator for lg screens and up -->
                <div class="absolute right-0 top-0 hidden h-full w-5 md:block" aria-hidden="true">
                    <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
                        <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor" stroke-linejoin="round" />
                    </svg>
                </div>
            </li>

            <li class="relative md:flex md:flex-1" wire:click="mudarPasso(3)">
                <!-- Upcoming Step -->
                <a href="#" class="group flex items-center">
                <span class="flex items-center px-6 py-4 text-sm font-medium">
                  <span class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 border-gray-300 group-hover:border-gray-400">
                    <span class="text-gray-500 group-hover:text-gray-900">03</span>
                  </span>
                  <span class="ml-4 text-sm font-medium text-gray-500 group-hover:text-gray-900">Passo 3</span>
                </span>
                </a>
            </li>

        </ol>
    </nav>

    <div class="mt-16">
        @if($passoAtual === 1)
            <div class="flex mt-1 w-full mx-auto max-w-sm justify-center p-6 border border-gray-300 rounded-2xl">
                <h2>Identificação</h2>

            </div>
        @endif
        @if($passoAtual === 2)
            <div>
                PASSO 2
            </div>

        @endif
        @if($passoAtual === 3)
            <div>
                PASSO 3
            </div>
        @endif

    </div>

</div>

