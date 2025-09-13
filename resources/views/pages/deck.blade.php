<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Flash Cards') }}
            </h2>

            <a href="{{ route('deck.create') }}" 
            class="px-4 py-2 bg-blue-600 text-xl text-gray-800 leading-tight">
                Adicionar Deck
            </a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach ($decks as $deck)
                    <div>
                        <h1>{{ $deck["nome"] }}</h1>
                        <p>Criado por {{ $deck["user_id"]}}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
