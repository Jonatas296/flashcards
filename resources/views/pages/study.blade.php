<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Estudo de Cartas
        </h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto">
        @if($card)
            <form action="{{ route('history.store') }}" method="POST">
                @csrf
                <input type="hidden" name="card_id" value="{{ $card->id }}">

                <!-- Carta como botão -->
                <button type="button" onclick="this.nextElementSibling.style.display='block'; this.style.display='none';" class="w-full p-6 bg-white rounded shadow text-left">
                    <h1 class="text-xl font-bold">{{ $card->front }}</h1>
                    <p class="mt-2 text-gray-500">Clique para ver a resposta</p>
                </button>

                <!-- Back da carta e botões de classificação -->
                <div style="display:none;">
                    <div class="p-6 bg-gray-100 rounded shadow mb-4">
                        <h1 class="text-xl font-bold">{{ $card->back }}</h1>
                    </div>
                    <div class="flex space-x-2">
                        <button type="submit" name="classification" value="1" class="px-4 py-2 bg-red-600 text-white rounded">Fácil</button>
                        <button type="submit" name="classification" value="2" class="px-4 py-2 bg-red-600 text-white rounded">Bom</button>
                        <button type="submit" name="classification" value="3" class="px-4 py-2 bg-red-600 text-white rounded">Difícil</button>
                        <button type="submit" name="classification" value="4" class="px-4 py-2 bg-red-600 text-white rounded">Não lembro</button>
                    </div>
                </div>
            </form>
        @else
            <p class="text-gray-500">Nenhuma carta disponível para estudo.</p>
        @endif
    </div>
</x-app-layout>
