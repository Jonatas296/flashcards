<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center w-full">
    {{ __('Flash Cards') }}
        </h2>
    </x-slot>

    
    <link rel="stylesheet" href="{{ asset('css/flashcards.css') }}">

    <div class="flashcards-container">

        <!-- Botão Adicionar -->
        <div class="add-card">
            <a href="{{ route('card.index') }}">Adicionar Cartão +</a>
        </div>

        <div class="content">
            <!-- Lado Esquerdo -->
            <div class="left">
                <h3>Decks de Estudo</h3>

                <div class="buttons">
                    <a href="{{ route('study.all') }}" class="btn study">Estudar</a>
                    <a href="{{ route(name: 'deck.index') }}" class="btn all">Ver Todos</a>
                </div>
            </div>

            <!-- Lado Direito -->
            <div class="right">
                <img src="{{ asset('images/flashcards.png') }}" alt="Flashcards">
            </div>
        </div>
    </div>
</x-app-layout>

