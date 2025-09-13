<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use App\Http\Requests\StoreDeckRequest;
use App\Http\Requests\UpdateDeckRequest;

class DeckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        //
        $decks = Deck::where('user_id', auth()->id())->get();
        return view('pages.deck', compact('decks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.deck-create'); // cria uma view específica para criar deck
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDeckRequest $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Deck::create([
            'name' => $request->name,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('deck.index')->with('success', 'Deck criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Deck $deck)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deck $deck)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDeckRequest $request, Deck $deck)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deck $deck)
    {
        //
    }
}
