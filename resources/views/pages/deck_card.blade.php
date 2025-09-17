<x-app-layout>
        <link rel="stylesheet" href="{{ asset('css/deck_card.css') }}">

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Cards do Deck: {{ $deck->nome }}
            </h2>

            <!-- Botão adicionar -->
            <a href="{{ route('card.create') }}" 
               class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
               ➕ Adicionar Card
            </a>
        </div>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto space-y-6">

        <!-- Título FlashCards -->
            <h1 class="text-4xl font-extrabold text-center mb-6 text-green-400">
                Flash<span class="text-green-200">Cards</span>
            </h1>

        <!-- Mensagens -->
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded font-medium">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded font-medium">
                {{ session('error') }}
            </div>
        @endif

        <!-- Lista de cards -->
        <div class="space-y-4">
            @forelse($cards as $card)
                <div class="bg-white shadow rounded p-4">
                    <div class="flex justify-between items-start">
                        <!-- Texto do card -->
                        <div>
                            <h3 class="font-bold text-lg">{{ $card->front }}</h3>
                            <p class="text-gray-600 mt-1">{{ $card->back }}</p>
                        </div>

                        <!-- Botão deletar -->
                        <form action="{{ route('card.destroy', $card->id) }}" method="POST"
                              onsubmit="return confirm('Tem certeza que deseja deletar este card?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 text-center">Nenhum card neste deck.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
