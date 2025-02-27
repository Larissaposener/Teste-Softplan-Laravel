<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bolo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'peso',
        'valor',
        'quantidade_disponivel'
    ];

    public function interessados()
    {
        return $this->belongsToMany(Interessado::class);
    }
}
