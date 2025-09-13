<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudyController extends Controller
{
    //
}

class CardController extends Controller
{
    public function index() {
        $cards = Card::cursor();
        return view('pages.card', ["cards" => $cards]);
    }

    public function studyAll()
    {
        $cards = Card::all();
        return view('pages.study', compact('cards'));
    }

    public function studyDeck(Deck $deck)
    {
        $cards = $deck->cards;
        return view('pages.study', compact('cards', 'deck'));
    }
}


