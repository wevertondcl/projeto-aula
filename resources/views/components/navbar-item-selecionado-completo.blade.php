@props(['titulo' => 'Passo 1'])
<a href="#" class="group flex w-full items-center">
    <span class="flex items-center px-6 py-4 text-sm font-medium">
        <span class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-green-500 group-hover:bg-green-700">
            <svg class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 0 1 .208 1.04l-9 13.5a.75.75 0 0 1-1.154.114l-6-6a.75.75 0 0 1 1.06-1.06l5.353 5.353 8.493-12.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd" />
            </svg>
        </span>
        <span class="ml-4 text-sm font-medium text-gray-900">{{$titulo}}</span>
    </span>
</a>
