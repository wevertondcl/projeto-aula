@props([
    'numero' => '01',
    'titulo' => 'Passo 1',
])
<a href="#" class="group flex items-center">
    <span class="flex items-center px-6 py-4 text-sm font-medium">
        <span class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 border-gray-300 group-hover:border-gray-400">
            <span class="text-gray-500 group-hover:text-gray-900">{{$numero}}</span>
        </span>
        <span class="ml-4 text-sm font-medium text-gray-500 group-hover:text-gray-900">{{$titulo}}</span>
    </span>
</a>
