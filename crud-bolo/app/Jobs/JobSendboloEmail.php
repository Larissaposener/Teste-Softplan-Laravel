<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

use App\Mail\SendBolosInteresseEmail;
use App\Models\Bolo;
use App\Models\Interessado;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\VarDumper\VarDumper;

class JobSendboloEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Cria uma nova instância do Job.
     *
     * @param \App\Models\Interessado $interessado
     * @param \Illuminate\Database\Eloquent\Collection $bolos
     */
    public function __construct(private $interessadoId)
    {
        
    }

    /**
     * Executa o job.
     *
     * @return void
     */
    public function handle()
    {
      
        $interessado = Interessado::find($this->interessadoId);
    
        if (!$interessado) {
            Log::error("Interessado com ID {$this->interessadoId} não encontrado.");
            return; 
        }
    
        
        $bolos = $interessado->bolos;



        
        if ($bolos->isEmpty()) {
            Log::info("Interessado com ID {$this->interessadoId} não tem bolos associados.");
            return; 
        }
    
        
        try {
            Mail::to($interessado->email)->send(new SendBolosInteresseEmail($interessado, $bolos));
    
            Log::info("E-mail enviado com sucesso para {$interessado->email}.");
        } catch (\Exception $e) {
            Log::error("Erro ao enviar o e-mail para {$interessado->email}: {$e->getMessage()}");
        }
    }
    
    public function backoff()
    {
        
        return [60, 120, 240, 480, 960]; // 1min, 2min, 4min, 8min, 16min
    }

}
