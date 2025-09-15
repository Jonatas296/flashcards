<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Deck;
use App\Http\Requests\StoreCardRequest;
use App\Http\Requests\UpdateCardRequest;

class CardController extends Controller {
    /*
    * Estudo de todas as cartas de todos os decks
     */
    public function studyAll() {
        $cards = Card::all(); // todas as cartas

        return view('pages.study', ['cards' => $cards]);
    }
    

    /**
     * Display a listing of the resource.
     */
    public function index() {
        //
        $decks = Deck::where('user_id', auth()->id())->get();
        $cards = Card::with('deck')->get(); // carrega todas as cartas com info do deck

        return view('pages.card', compact('cards', 'decks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
        $decks = Deck::where('user_id', auth()->id())->get(); // decks do usuário
        return view('pages.card', compact('decks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCardRequest $request)
    {
        //
        $request->validate([
            'deck_id' => 'required|exists:decks,id',
            'front' => 'required|string|max:255',
            'back' => 'required|string|max:1000',
        ]);

        // Criar carta
        Card::create([
            'deck_id' => $request->deck_id,
            'front' => $request->front,
            'back' => $request->back,
        ]);

        return redirect()->route('card.index')->with('success', 'Carta criada com sucesso!');
    }

    public function showBack($cardId) {
        $cards = Card::where('id', $cardId)->get(); // pega a carta
        session(['show_back' => true]); // marca que deve mostrar verso
        return view('pages.study', compact('cards'));
    }   



    /**
     * Display the specified resource.
     */
    public function show(Card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Card $card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCardRequest $request, Card $card)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {
        //
    }
}
