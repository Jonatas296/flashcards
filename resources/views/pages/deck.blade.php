<x-app-layout>
    <!-- Header -->
    <x-slot name="header">
        <div class="header-decks">
            <h2 class="titulo-decks">Lista de Decks</h2>
            <a href="{{ route('deck.create') }}" class="btn-add-deck">Adicionar Deck +</a>
        </div>
    </x-slot>

    <!-- Conteúdo -->
    <div class="conteudo-decks">
        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @if($decks->isEmpty())
            <p class="no-decks">Nenhum deck encontrado. Crie um novo deck para começar!</p>
        @endif

        <div class="grid-decks">
            @foreach($decks as $deck)
                <div class="card-deck">
                    <!-- form de update com id para submissão via botão externo -->
                    <form id="update-{{ $deck->id }}" action="{{ route('deck.update', $deck->id) }}" method="POST" class="form-deck">
                        @csrf
                        @method('PUT')

                        <!-- nome (clicar para editar) -->
                        <input type="text" name="nome" value="{{ $deck->nome }}" class="input-deck">
                    </form>

                    <!-- área de ícones centralizada -->
                    <div class="card-icons">
                        <!-- botão salva o form de update (usa attribute form="...") -->
                        <button type="submit" form="update-{{ $deck->id }}" class="icon-save" title="Salvar">
                            💾
                        </button>

                        <!-- delete (form separado) -->
                        <form action="{{ route('deck.destroy', $deck->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar este deck?');" class="inline-delete">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="icon-delete" title="Deletar">🗑️</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
