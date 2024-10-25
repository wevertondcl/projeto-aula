@props([
    'label' => 'Nome',
    'campo' => 'nome',
    'erros',
    'type' => 'text',
    'placeholder' => ''
])
<div>
    <label for="{{$campo}}" class="block text-sm font-medium leading-6 text-gray-900">{{$label}}</label>
    <div class="relative mt-2 rounded-md shadow-sm">
        <input wire:model.live.debounce.600ms="{{$campo}}" type="{{$type}}" name="{{$campo}}" id="{{$campo}}"
               @class([
                    'block w-full rounded-md border-0 py-1.5 pr-10 text-red-900 ring-1 ring-inset ring-red-300 placeholder:text-red-300 focus:ring-2 focus:ring-inset
                    focus:ring-red-500  sm:text-sm sm:leading-6' => $erros->has($campo),
                    'block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400
                    focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6' => !$erros->has($campo)
                ])
               placeholder="{{$placeholder}}" aria-invalid="true" aria-describedby="nome-error">
        @if($erros->has($campo))
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-8-5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-1.5 0v-4.5A.75.75 0 0 1 10 5Zm0 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                </svg>
            </div>
        @endif
    </div>
    @if($erros->has($campo))
        <p class="mt-2 text-sm text-red-600" id="{{$campo}}-error">{{$erros->first($campo)}}</p>
    @endif
</div>
