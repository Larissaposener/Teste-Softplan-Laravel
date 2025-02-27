<?php

namespace App\Http\Controllers;

use App\Models\Bolo;
use Illuminate\Http\Request;
use App\Http\Resources\BoloResource;
use Illuminate\Validation\ValidationException;

class CrudBoloController extends Controller
{


public function bolosDisponiveis()
   {
    try {
     
        $bolosDisponiveis2 = Bolo::where('quantidade_disponivel', '>', 0)->get();
      
        return BoloResource::collection($bolosDisponiveis2);
    } catch (\Exception $e) {
       
        return response()->json([
            'error' => 'Erro ao buscar os bolos disponíveis',
            'message' => $e->getMessage(),
        ], 500);
    }
   }

    public function index()
    {
        try {
            $bolos = Bolo::all();
            return BoloResource::collection($bolos);
        } catch (\Exception $e) {
       
            return response()->json([
                'error' => 'Erro ao buscar os bolos',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

 
    public function store(Request $request)
    {
        try {
           
            $validated = $this->validateBoloData($request);

            
            $bolo = Bolo::create($validated);

        
                return response()->json([
                    'message' => 'Bolo criado com sucesso!',
                    'data' => $bolo 
                ], 201);
        } catch (ValidationException $e) {
            
            return response()->json([
                'error' => 'Validação falhou.',
                'messages' => $e->errors(), 
            ], 422); 
        } catch (\Exception $e) {
          
            return response()->json([
                'error' => 'Algo deu errado.',
                'message' => $e->getMessage(), 
            ], 500); 
        }
    }

  
    public function show($id)
    {
        try {
            
            $bolo = Bolo::findOrFail($id);
            return new BoloResource($bolo);
        } catch (\Exception $e) {
            
            return response()->json([
                'error' => 'Bolo não encontrado.',
                'message' => $e->getMessage(),
            ], 404); 
        }
    }

    
    public function update(Request $request, $id)
    {
        try {
            
            $validated = $this->validateBoloData($request);

            
            $bolo = Bolo::findOrFail($id);

           
            $bolo->update($validated);

           
            return new BoloResource($bolo);
        } catch (ValidationException $e) {
            
            return response()->json([
                'error' => 'Validação falhou.',
                'messages' => $e->errors(), 
            ], 422); 
        } catch (\Exception $e) {
            
            return response()->json([
                'error' => 'Erro ao atualizar o bolo.',
                'message' => $e->getMessage(), 
            ], 500); 
        }
    }

    
    public function destroy($id)
    {
        try {
           
            $bolo = Bolo::findOrFail($id);

         
            $bolo->delete();

            return response()->json(null, 204);
        } catch (\Exception $e) {
        
            return response()->json([
                'error' => 'Erro ao excluir o bolo.',
                'message' => $e->getMessage(), 
            ], 500); 
        }
    }

    


    private function validateBoloData(Request $request)
    {
        return $request->validate([
            'nome' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'peso' => 'required|numeric|min:0.1', 
            'valor' => 'required|numeric|min:0.1', 
            'quantidade_disponivel' => 'required|integer|min:0', 
        ], [
            'nome.required' => 'O nome do bolo é obrigatório.',
            'nome.string' => 'O nome deve ser uma string.',
            'nome.regex' => 'O nome só pode conter letras e espaços.',
            'peso.required' => 'O peso é obrigatório.',
            'peso.numeric' => 'O peso deve ser um número.',
            'peso.min' => 'O peso deve ser maior que 0.',
            'valor.required' => 'O valor é obrigatório.',
            'valor.numeric' => 'O valor deve ser um número.',
            'valor.min' => 'O valor não pode ser negativo.',
            'quantidade_disponivel.required' => 'A quantidade disponível é obrigatória.',
            'quantidade_disponivel.integer' => 'A quantidade disponível deve ser um número inteiro.',
            'quantidade_disponivel.min' => 'A quantidade disponível não pode ser negativa.',
        ]);
    }
}
