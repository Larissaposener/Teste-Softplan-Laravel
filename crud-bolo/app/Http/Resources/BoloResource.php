<?php

// app/Http/Resources/BoloResource.php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BoloResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'peso' => $this->peso,
            'valor' => $this->valor,
            'quantidade_disponivel' => $this->quantidade_disponivel,
        ];
    }
}
