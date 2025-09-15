<x-app-layout>
    <!-- Header -->
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Meus Decks
            </h2>
            <a href="{{ route('deck.create') }}" 
               class="px-4 py-2 bg-blue-600 text-gray-800 leading-tight">
                Adicionar Deck
            </a>
        </div>
    </x-slot>

    <!-- Conteúdo -->
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if(session('success'))
                    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if($decks->isEmpty())
                    <p class="text-gray-500">Nenhum deck encontrado. Crie um novo deck para começar!</p>
                @endif

                @foreach($decks as $deck)
                <div class="flex items-center justify-between p-4 mb-2 bg-gray-100 rounded shadow hover:bg-gray-200">
                    <form action="{{ route('deck.update', $deck->id) }}" method="POST" class="flex items-center w-full">
                        @csrf
                        @method('PUT')

                        <!-- Campo de nome do deck -->
                        <input type="text" name="nome" value="{{ $deck->nome }}" class="border rounded px-2 py-1 flex-1">

                        <!-- Botão salvar -->
                        <button type="submit" class="ml-2 px-2 py-1 bg-blue-600 text-gray-800 leading-tight">
                            Salvar
                        </button>
                    </form>

                    <!-- Botão deletar -->
                    <form action="{{ route('deck.destroy', $deck->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar este deck?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="ml-2 text-red-600 hover:text-red-800" title="Deletar">
                            🗑️
                        </button>
                    </form>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>
