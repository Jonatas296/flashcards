<x-app-layout>
    <div class="max-w-3xl mx-auto py-12">
        <div class="bg-white shadow rounded p-6 text-center">

            <h2 class="text-2xl font-bold mb-4">{{ $card->front }}</h2>
            <p class="text-gray-600 mb-6">{{ $card->back }}</p>

            <form action="{{ route('history.store') }}" method="POST" class="flex justify-center gap-4">
                @csrf
                <input type="hidden" name="card_id" value="{{ $card->id }}">

                <button type="submit" name="classification" value="1" class="px-4 py-2 bg-red-500 text-white rounded">Não lembro</button>
                <button type="submit" name="classification" value="2" class="px-4 py-2 bg-yellow-400 text-white rounded">Difícil</button>
                <button type="submit" name="classification" value="3" class="px-4 py-2 bg-blue-500 text-white rounded">Bom</button>
                <button type="submit" name="classification" value="4" class="px-4 py-2 bg-green-500 text-white rounded">Fácil</button>
            </form>

        </div>
    </div>
</x-app-layout>
