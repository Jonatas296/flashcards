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

                        <!-- Deletar Deck -->
                        <form action="{{ route('deck.destroy', $deck->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn" title="Deletar Deck">
                                <!-- Ícone de lixeira -->
                                <svg xmlns="http://www.w3.org/2000/svg" 
                                     class="h-5 w-5 text-white" 
                                     fill="none" 
                                     viewBox="0 0 24 24" 
                                     stroke="currentColor" 
                                     stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" 
                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
