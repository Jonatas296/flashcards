<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/card.css') }}">

    <div class="py-12 max-w-3xl mx-auto rounded p-6">
        <form action="{{ route('card.store') }}" method="POST">
            @csrf

            <!-- Título FlashCards -->
            <h1 class="text-4xl font-extrabold text-center mb-6 text-green-400">
                Flash<span class="text-green-200">Cards</span>
            </h1>

            <!-- Deck -->
            <div class="mb-4">
                <label class="block mb-1 font-bold">Deck</label>
                <select name="deck_id" class="w-full border rounded px-2 py-1">
                    <option value="">-- Selecione um deck --</option>
                    @foreach($decks as $deck)
                        <option value="{{ $deck->id }}">{{ $deck->nome }}</option>
                    @endforeach
                </select>
                @error('deck_id') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Frente -->
            <div class="mb-4">
                <label class="block mb-1 font-bold">Frente</label>
                <input type="text" name="front" value="{{ old('front') }}" class="w-full border rounded px-2 py-1">
                @error('front') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Verso -->
            <div class="mb-4">
                <label class="block mb-1 font-bold">Verso</label>
                <textarea name="back" class="w-full border rounded px-2 py-1">{{ old('back') }}</textarea>
                @error('back') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Botões -->
            <div class="flex space-x-2">
                <button type="submit" class="px-4 py-2 bg-green-600 text-gray-800 leading-tight">
                    Criar
                </button>
                <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-400 text-gray-800 rounded">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
