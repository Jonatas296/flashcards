<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-black leading-tight text-center">
            Estudo de Cartas
        </h2>
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/study.css') }}">

    <div class="py-12 max-w-4xl mx-auto text-center">

        @if($card)
            <form action="{{ route('history.store') }}" method="POST">
                @csrf
                <input type="hidden" name="card_id" value="{{ $card->id }}">

                <!-- Frente -->
                <button type="button" class="flashcard"
                        onclick="this.nextElementSibling.style.display='block'; this.style.display='none';">
                    <h1 class="flash-title">
                        Flash<span>Cards</span>
                    </h1>
                    <p class="flash-text">{{ $card->front }}</p>
                </button>

                <!-- Verso -->
                <div class="flashcard" style="display:none;">
                    <h1 class="flash-title">
                        Flash<span>Cards</span>
                    </h1>
                    <p class="flash-text">{{ $card->back }}</p>

                    <div class="btn-group">
                        <button type="submit" name="classification" value="1" class="btn">Fácil</button>
                        <button type="submit" name="classification" value="2" class="btn">Bom</button>
                        <button type="submit" name="classification" value="3" class="btn">Difícil</button>
                        <button type="submit" name="classification" value="4" class="btn">Não sei</button>
                    </div>
                </div>
            </form>
        @else
            <p class="no-card">{{ $message ?? 'Nenhuma carta disponível para estudo.' }}</p>
        @endif
    </div>
</x-app-layout>
