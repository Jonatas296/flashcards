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
                <input type="text" name="deck" value="{{ old('deck') }}">
                @error('deck') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Frente -->
            <div class="mb-4">
                <label class="block mb-1 font-bold">Frente</label>
                <input type="text" name="front" value="{{ old('front') }}">
                @error('front') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Verso -->
            <div class="mb-4">
                <label class="block mb-1 font-bold">Verso</label>
                <textarea name="back">{{ old('back') }}</textarea>
                @error('back') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Botões -->
            <div class="flex space-x-2">
                <button type="submit">Criar</button>
                <a href="{{ route('card.index') }}">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>
