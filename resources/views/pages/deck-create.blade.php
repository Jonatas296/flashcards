<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Criar Novo Deck
        </h2>
    </x-slot>

    <div class="py-12 max-w-2xl mx-auto bg-white shadow rounded p-6">
        <!-- Mensagem de sucesso -->
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('deck.store') }}" method="POST">
            @csrf

            <!-- Nome do Deck -->
            <div class="mb-4">
                <label class="block mb-1 font-bold">Nome do Deck</label>
                <input type="text" name="nome" class="w-full border rounded px-2 py-1" value="{{ old('nome') }}">
                @error('nome') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Botões -->
            <div class="flex space-x-2">
                <button type="submit" class="px-4 py-2 bg-green-600 text-gray-800 leading-tight">Criar</button>
                <a href="{{ route('deck.index') }}" class="px-4 py-2 bg-gray-400 text-gray-800 leading-tight">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>
