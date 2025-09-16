<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Estudo de Cartas
        </h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto">

        @if($card)
            <!-- Form de estudo -->
            <form action="{{ route('history.store') }}" method="POST">
                @csrf
                <input type="hidden" name="card_id" value="{{ $card->id }}">

                <!-- Frente da carta como botão -->
                <button type="button" onclick="this.nextElementSibling.style.display='block'; this.style.display='none';" class="w-full p-6 bg-white rounded shadow text-left">
                    <h1 class="text-xl font-bold">{{ $card->front }}</h1>
                    <p class="mt-2 text-gray-500">Clique para ver a resposta</p>
                </button>

                <!-- Verso da carta e botões de classificação -->
                <div style="display:none;">
                    <div class="p-6 bg-gray-100 rounded shadow mb-4">
                        <h1 class="text-xl font-bold">{{ $card->back }}</h1>
                    </div>
                    <div class="flex space-x-2">
                        <button type="submit" name="classification" value="1" class="px-4 py-2 bg-red-600 text-white rounded">Fácil</button>
                        <button type="submit" name="classification" value="2" class="px-4 py-2 bg-yellow-500 text-white rounded">Bom</button>
                        <button type="submit" name="classification" value="3" class="px-4 py-2 bg-blue-600 text-white rounded">Difícil</button>
                        <button type="submit" name="classification" value="4" class="px-4 py-2 bg-gray-600 text-white rounded">Não lembro</button>
                    </div>
                </div>
            </form>

        @else
            <!-- Mensagem quando não há cartas -->
            <p class="text-gray-500 text-center text-lg">
                {{ $message ?? 'Nenhuma carta disponível para estudo.' }}
            </p>

            <div class="mt-6 text-center">
                @if(isset($message) && $message == 'Nenhuma carta criada ainda. Crie cartas para começar a estudar!')
                    <a href="{{ route('card.index') }}" class="inline-block px-4 py-2 bg-green-600 text-white rounded shadow hover:bg-green-700 transition">
                        Criar Carta
                    </a>
                @elseif(isset($message) && $message == 'Você já revisou todas as cartas hoje!')
                    <a href="{{ route('dashboard') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded shadow hover:bg-blue-700 transition">
                        Voltar ao Dashboard
                    </a>
                @endif
            </div>
        @endif

    </div>
</x-app-layout>
