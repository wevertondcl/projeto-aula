@props([
    'numero' => '01',
    'titulo' => 'Passo 1'
])
<a href="#" class="flex items-center px-6 py-4 text-sm font-medium" aria-current="step">
    <span class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 border-indigo-600">
        <span class="text-indigo-600">{{$numero}}</span>
    </span>
    <span class="ml-4 text-sm font-medium text-indigo-600">{{$titulo}}</span>
</a>
