<x-app-layout>
    <div class="max-w-3xl mx-auto py-12">
        <div class="bg-gray-100 shadow-lg rounded-lg p-8 text-center">

            <!-- Carta -->
            <div id="flashcard" class="cursor-pointer p-6 hover:shadow-xl transition-shadow duration-200">
                <!-- Front -->
                <h2 id="card-front" class="text-3xl font-extrabold mb-6 text-gray-900">{{ $card->front }}</h2>
                
                <!-- Verso -->
                <div id="card-back" class="hidden">
                    <h2 class="text-2xl font-bold mb-2 text-green-800">Resposta</h2>
                    <p class="text-lg text-gray-800">{{ $card->back }}</p>
                </div>

                <!-- Formulário de classificação -->
                <form id="classification-form" action="{{ route('history.store') }}" method="POST" class="flex justify-center gap-4 hidden mt-4">
                    @csrf
                    <input type="hidden" name="card_id" value="{{ $card->id }}">

                    <button type="submit" name="classification" value="1" class="px-5 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded shadow">Não lembro</button>
                    <button type="submit" name="classification" value="2" class="px-5 py-2 bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-semibold rounded shadow">Difícil</button>
                    <button type="submit" name="classification" value="3" class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded shadow">Bom</button>
                    <button type="submit" name="classification" value="4" class="px-5 py-2 bg-green-800 hover:bg-green-900 text-white font-semibold rounded shadow">Fácil</button>
                </form>
            </div>

        </div>
    </div>

    <script>
        const flashcard = document.getElementById('flashcard');
        const cardFront = document.getElementById('card-front');
        const cardBack = document.getElementById('card-back');
        const form = document.getElementById('classification-form');

        flashcard.addEventListener('click', () => {
            cardFront.classList.add('hidden');
            cardBack.classList.remove('hidden');
            form.classList.remove('hidden');
        });
    </script>
</x-app-layout>
