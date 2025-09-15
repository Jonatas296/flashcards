<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Flash Cards') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

                    <!-- Criar Card -->
                    <a href="{{ route('card.index') }}" 
                       class="flex items-center justify-center px-4 py-6 bg-blue-600 text-gray-800 leading-tight">
                        Criar Card
                    </a>

                    <!-- Estudar -->
                    <a href="{{ route('study.all') }}" 
                       class="flex items-center justify-center px-4 py-6 bg-green-600 text-gray-800 leading-tight">
                        Estudar
                    </a>

                    <!-- Ver Todos os Decks -->
                    <a href="{{ route('deck.index') }}" 
                       class="flex items-center justify-center px-4 py-6 bg-gray-600 text-gray-800 leading-tight">
                        Ver Decks
                    </a>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
