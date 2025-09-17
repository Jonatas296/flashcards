<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    // Página inicial de estudo
    public function index()
    {
        // Pega apenas cartas que precisam ser revisadas ou nunca foram revisadas
        $cards = Card::whereDoesntHave('histories', function ($query) {
            $query->where('user_id', auth()->id())
                  ->where('next_review_at', '>', now());
        })->get();

        $firstCard = $cards->first();

        if (!$firstCard) {
            return redirect()->back()->with('success', 'Nenhuma carta para estudar no momento!');
        }

        
        return redirect()->route('study.show_back', $firstCard->id);
    }

    // Mostra a frente da carta
    public function showBack($cardId)
    {
        $card = Card::findOrFail($cardId);
        return view('pages.study', compact('card'));
    }

    // Salva a classificação e calcula próxima revisão
    public function store(Request $request)
    {
        $request->validate([
            'card_id' => 'required|exists:cards,id',
            'classification' => 'required|integer|in:1,2,3,4',
        ]);

        $classification = (int) $request->classification;

        // Intervalo de dias baseado na dificuldade
        $intervalDays = match ($classification) {
            1 => 1,  // muito difícil
            2 => 2,  // difícil
            3 => 4,  // regular
            4 => 7,  // fácil
        };

        // Atualiza ou cria histórico
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

        // Próxima carta pronta para revisão
        $cards = Card::whereDoesntHave('histories', function ($query) {
            $query->where('user_id', auth()->id())
                  ->where('next_review_at', '>', now());
        })->get();

        $currentIndex = $cards->search(fn($c) => $c->id == $request->card_id);
        $nextCard = $cards->get($currentIndex + 1);

        if ($nextCard) {
            return redirect()->route('study.show_back', $nextCard->id);
        }

        return redirect()->route('dashboard')->with('success', 'Você finalizou todas as cartas que precisam ser revisadas hoje!');
    }
}

