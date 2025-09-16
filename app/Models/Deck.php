<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Deck extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'user_id'];

    // Relacionamento com Card
    public function cards()
    {
        return $this->hasMany(Card::class);
    }
    
}

