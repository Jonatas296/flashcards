<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deck extends Model {
    //
    protected $fillable = ['name', 'user_id']; // adiciona user_id se quiser decks por usuário

    public function cards(){
        return $this->hasMany(Card::class);
    }

}
