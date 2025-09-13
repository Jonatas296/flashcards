<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Http\Requests\StoreHistoryRequest;
use App\Http\Requests\UpdateHistoryRequest;

class HistoryController extends Controller {

    // Seleciona as cartas que precisam ser revisadas
    public function index() {
        $userId = auth()->id();

        // Busca cartas que já têm histórico e precisam ser revisadas
        $cardsToReview = Card::whereHas('histories', function($q) use ($userId) {
            $q->where('user_id', $userId)
              ->where('next_review_at', '<=', now());
        })->get();

        // Se não houver histórico, pega cartas novas
        if ($cardsToReview->isEmpty()) {
            $cardsToReview = Card::doesntHave('histories')->get();
        }

        return view('pages.study', ['cards' => $cardsToReview]);
    }

    // Registra a classificação após estudo
    public function store(Request $request){
        $request->validate([
            'card_id' => 'required|exists:cards,id',
            'classification' => 'required|integer|in:1,2,3,4',
        ]);

        $history = History::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'card_id' => $request->card_id,
            ],
            [
                'classification' => $request->classification,
                'reviewed_at' => now(),
                'next_review_at' => $this->calculateNextReview($request->classification),
            ]
        );

        return redirect()->back()->with('success', 'Classificação registrada!');
    }

    // Função simples para calcular próxima revisão
    private function calculateNextReview($classification){
        switch ($classification) {
            case 1: return now()->addDays(3); // Fácil
            case 2: return now()->addDays(1); // Bom
            case 3: return now()->addHours(1); // Difícil
            case 4: return now()->addMinutes(10); // Não lembro
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHistoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(History $history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(History $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHistoryRequest $request, History $history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(History $history)
    {
        //
    }
}
