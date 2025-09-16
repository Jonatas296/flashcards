<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    //

     protected $fillable = [
        'user_id',
        'card_id',
        'classification',
        'reviewed_at',
        'next_review_at',
    ];

    public const CLASSIFICATIONS = [
        1 => 'Fácil',
        2 => 'Bom',
        3 => 'Difícil',
        4 => 'Não lembro',
    ];

    public function card(){
        return $this->belongsTo(Card::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    // Accessor para mostrar a classificação em texto
    public function getClassificationLabelAttribute(){
        return self::CLASSIFICATIONS[$this->classification] ?? 'Desconhecida';
    }
}