<?php

// app/Models/Interessado.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interessado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 
        'email', 
    ];

    public function bolos()
   {
    return $this->belongsToMany(Bolo::class, 'interessados_bolo', 'interessados_id', 'bolo_id');
   }
}
