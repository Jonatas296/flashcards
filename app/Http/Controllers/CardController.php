<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Deck;
use App\Http\Requests\StoreCardRequest;
use App\Http\Requests\UpdateCardRequest;

class CardController extends Controller
{
    /**
     * Estudo da primeira carta de todos os decks
     */
    public function studyAll()
    {
        $card = Card::first(); // pega a primeira carta

        if (!$card) {
            return redirect()->route('dashboard')->with('error', 'Nenhuma carta para estudar!');
        }

        return view('pages.study', compact('card'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $decks = Deck::where('user_id', auth()->id())->get();
        $cards = Card::with('deck')->get();

        return view('pages.card', compact('cards', 'decks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $decks = Deck::where('user_id', auth()->id())->get();
        return view('pages.card', compact('decks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCardRequest $request)
    {
        $request->validate([
            'deck_id' => 'required|exists:decks,id',
            'front' => 'required|string|max:255',
            'back' => 'required|string|max:1000',
        ]);

        Card::create([
            'deck_id' => $request->deck_id,
            'front' => $request->front,
            'back' => $request->back,
        ]);

        return redirect()->route('card.index')->with('success', 'Carta criada com sucesso!');
    }

    /**
     * Mostrar verso de uma carta específica
     */
    public function showBack($cardId)
    {
        $card = Card::find($cardId);

        if (!$card) {
            return redirect()->route('dashboard')->with('error', 'Carta não encontrada!');
        }

        session(['show_back' => true]);
        return view('pages.study', compact('card'));
    }

    /**
     * Editar carta
     */
    public function edit(Card $card)
    {
        $decks = Deck::where('user_id', auth()->id())->get();
        return view('pages.card-edit', compact('card', 'decks'));
    }

    /**
     * Atualizar carta
     */
    public function update(UpdateCardRequest $request, Card $card)
    {
        $request->validate([
            'deck_id' => 'required|exists:decks,id',
            'front' => 'required|string|max:255',
            'back' => 'required|string|max:1000',
        ]);

        $card->update([
            'deck_id' => $request->deck_id,
            'front' => $request->front,
            'back' => $request->back,
        ]);

        return redirect()->route('card.index')->with('success', 'Carta atualizada com sucesso!');
    }

    /**
     * Remover carta
     */
    public function destroy(Card $card){
        $deckId = $card->deck_id; // salva o id do deck do card
        $card->delete();

        return redirect()->route('deck.show', $deckId)
        ->with('success', 'Carta removida com sucesso!');
    }

    /**
 * Listar cards de um deck específico
 */
    public function cardsByDeck(Deck $deck) {
        $cards = $deck->cards()->get(); // pega todos os cards do deck
        return view('pages.deck_card', compact('deck', 'cards'));
    }

}
