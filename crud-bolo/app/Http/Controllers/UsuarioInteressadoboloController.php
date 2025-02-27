<?php



namespace App\Http\Controllers;

use App\Http\Resources\InteressadoResource;
use App\Jobs\JobSendboloEmail;
use App\Models\Interessado;
use App\Models\Bolo;
use Illuminate\Http\Request;

class UsuarioInteressadoboloController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email',
            'bolo_ids.*' => 'exists:bolos,id', 
        ]);

        $interessado = Interessado::create($validated);

        if (!empty($validated['bolo_ids'])) {
            $interessado->bolos()->attach($validated['bolo_ids']);
        }else {
            
            return response()->json([
                'message' => 'Nenhum bolo selecionado.'
            ], 400);  
        }

        JobSendboloEmail::dispatch($interessado->id)->onQueue('default');

        return response()->json($interessado, 201);
    }

    public function index()
{
    try {
       
        $interessados = Interessado::all();

        return InteressadoResource::collection($interessados);

    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Erro ao buscar os interessados.',
            'message' => $e->getMessage(),
        ], 500);
    }
}

}
