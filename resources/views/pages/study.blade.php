<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @isset($deck)
                Estudo do Deck: {{ $deck->name }}
            @else
                Estudo de Todas as Cartas
            @endisset
        </h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto">
        @forelse ($cards as $card)
            <div class="p-6 bg-white rounded shadow mb-6">
                <h1 class="text-xl font-bold">{{ $card->front }}</h1>
                <p class="mt-2">{{ $card->back }}</p>
            </div>
        @empty
            <p class="text-gray-500">Nenhuma carta disponível para estudo.</p>
        @endforelse
    </div>
</x-app-layout>
