<?php

namespace Tests\Feature\Api;

use Tests\TestCase;

use Illuminate\Foundation\Testing\RefreshDatabase;

class PostBoloTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_bolo()  
    {
        $data = [
            'nome' => 'Bolo de morango',
            'peso' => 1.5,
            'valor' => 30.00, 
            'quantidade_disponivel' => 10
        ];

        $response = $this->postJson('/api/bolos', $data);

       
        $response->assertStatus(201);

        $response->assertJson([
            'message' => 'Bolo criado com sucesso!',
            'data' => $data
        ]);

   
        $this->assertDatabaseHas('bolos', $data);
    }


        public function test_create_bolo_error()
        {
        $data = [
            'nome' => '123', // Nome inválido
            'peso' => '1.5',  // Peso válido
            'valor' => 30.00, // Valor válido
            'quantidade_disponivel' => 10 // Quantidade válida
        ];

       
        $response = $this->postJson('/api/bolos', $data);

        $response->assertStatus(422);

        $response->assertJson([
            'error' => 'Validação falhou.',
            'messages' => [
                'nome' => [
                    'O nome só pode conter letras e espaços.'
                ]
            ]
        ]);

        // Verificar que o bolo não foi salvo no banco de dados
        $this->assertDatabaseMissing('bolos', $data);  // O bolo não deve existir
    }

}
