<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Criar Carta
        </h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto bg-white shadow rounded p-6">
        <form action="{{ route('card.store') }}" method="POST">
            @csrf

            <!-- Select Deck -->
            <div class="mb-4">
                <label class="block mb-1 font-bold">Deck</label>
                <select name="deck_id" class="w-full border rounded px-2 py-1 bg-white text-gray-800 leading-tight">
                    <option value="">Selecione um deck</option>
                    @foreach($decks as $deck)
                        <option value="{{ $deck->id }}">{{ $deck->name }}</option>
                    @endforeach
                </select>
                @error('deck_id') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>


            <!-- Front -->
            <div class="mb-4">
                <label class="block mb-1 font-bold">Front (pergunta)</label>
                <input type="text" name="front" class="w-full border rounded px-2 py-1" value="{{ old('front') }}">
                @error('front') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Back -->
            <div class="mb-4">
                <label class="block mb-1 font-bold">Back (resposta)</label>
                <textarea name="back" class="w-full border rounded px-2 py-1">{{ old('back') }}</textarea>
                @error('back') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Botões -->
            <div class="flex space-x-2">
                <button type="submit" class="px-4 py-2 bg-black text-gray-800 leading-tight">Criar</button>
                <a href="{{ route('card.index') }}" class="px-4 py-2 bg-black text-gray-800 leading-tight">Cancelar</a>
            </div>

        </form>
    </div>
</x-app-layout>
