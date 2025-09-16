<x-app-layout>
    <!-- Header -->
    <x-slot name="header">
        <div class="header-decks">
            <h2 class="titulo-decks">Meus Decks</h2>
            <a href="{{ route('deck.create') }}" class="btn-add-deck">Adicionar Deck +</a>
        </div>
    </x-slot>

    <!-- Conteúdo -->
    <div class="conteudo-decks">
        <!-- Mensagens -->
        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert-error">{{ session('error') }}</div>
        @endif

        @if($decks->isEmpty())
            <p class="no-decks">Você ainda não possui decks. Crie um novo para começar!</p>
        @endif

        <!-- Grid -->
        <div class="grid-decks">
            @foreach($decks as $deck)
                <div class="card-deck">
                    <!-- Nome editável -->
                    <form id="update-{{ $deck->id }}" action="{{ route('deck.update', $deck->id) }}" method="POST" class="form-deck">
                        @csrf
                        @method('PUT')
                        <input type="text" name="nome" value="{{ $deck->nome }}" class="input-deck">
                    </form>

                    <!-- Ícones -->
                    <div class="card-icons">
                        <!-- Ver Cards -->
                        <a href="{{ route('deck.show', $deck->id) }}" class="icon-save" title="Ver Cards">
                            Ver cards
                        </a>

                       
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
