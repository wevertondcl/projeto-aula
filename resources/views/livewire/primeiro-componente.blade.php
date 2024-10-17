<div>
    <p>Contador: {{$contador}}</p>
    <button class="p-3 border-2 border-amber-600" wire:click="incrementar(2)">Incrementar</button>

    <button class="p-3 border-2 border-blue-600" wire:click="decrementar(2)">Decrementar</button>

    <button class="p-3 border-2 border-purple-600" wire:click="decrementar(5)">Decrementar 5</button>
</div>
