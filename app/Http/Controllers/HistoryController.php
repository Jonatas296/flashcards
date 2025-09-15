<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller {
    public function index(){
        // Busca todas as cartas para estudo
        $cards = Card::all(); // ou aplique lógica de revisão
        $firstCard = $cards->first();

        if (!$firstCard) {
            return redirect()->back()->with('success', 'Nenhuma carta para estudar!');
        }

        // Redireciona para mostrar a frente da primeira carta
        return redirect()->route('study.show_back', $firstCard->id);
    }

    public function showBack($cardId) {
        $card = Card::findOrFail($cardId);
        return view('pages.study', compact('card'));
    }

    public function store(Request $request)
    {
        $request->validate([
        'card_id' => 'required|exists:cards,id',
        'classification' => 'required|integer|in:1,2,3,4',
    ]);

    // Define o intervalo com base na classificação
    $classification = (int) $request->classification;

    $intervalDays = match($classification) {
        1 => 1,   // muito difícil
        2 => 2,   // difícil
        3 => 4,   // regular
        4 => 7,   // fácil
    };

    History::updateOrCreate(
        [
            'user_id' => auth()->id(),
            'card_id' => $request->card_id,
        ],
        [
            'classification' => $request->classification,
            'reviewed_at' => now(),
            'next_review_at' => now()->addDays($intervalDays),
        ]
    );

    // Próxima carta (mesma lógica que você já tem)
    $cards = Card::all();
    $currentIndex = $cards->search(fn($c) => $c->id == $request->card_id);
    $nextCard = $cards->get($currentIndex + 1);

    if ($nextCard) {
        return redirect()->route('study.show_back', $nextCard->id);
    }

    return redirect()->route('dashboard')->with('success', 'Você finalizou todas as cartas!');

    }
}

