<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model {

    use HasFactory;


    protected $fillable = [
        'deck_id',
        'front',
        'back',
    ];

    // Relacionamento com Deck
    public function deck()
    {
        return $this->belongsTo(Deck::class);
    }

    // Relacionamento com History
    public function histories()
    {
        return $this->hasMany(History::class);
    }
}
