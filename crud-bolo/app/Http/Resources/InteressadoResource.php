<?php

namespace App\Http\Resources;


namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InteressadoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'nome' => $this->nome,
            'email' => $this->email,
            'bolo_ids' => $this->bolos->pluck('id')  
        ];
    }
}
