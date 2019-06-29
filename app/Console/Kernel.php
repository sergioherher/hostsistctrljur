<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Juicio;
use App\Traits\MpdfTrait;

class Kernel extends ConsoleKernel
{
    
    use MpdfTrait;
    
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        $schedule->call(function () {
            try {
                $juicios = Juicio::all();
                $mpdf = $this->MpdfObject();
                foreach ($juicios as $key => $juicio) {
                    $otros_pdf = storage_path("app/juicios/".$juicio->id."/otros-".$juicio->id.".pdf");
                    $expediente_pdf = storage_path("app/juicios/".$juicio->id."/expediente-".$juicio->id.".pdf");

                    if(file_exists($expediente_pdf)) {              
                        $pagecount = $mpdf->SetSourceFile($expediente_pdf);
                        for ($i = 1; $i <= $pagecount; $i++) {
                            $tplId = $mpdf->ImportPage($i);
                            $specs = $mpdf->getTemplateSize($tplId);
                            $mpdf->addPage($specs['orientation']);
                            $mpdf->UseTemplate($tplId);  
                            //$mpdf->SetPageTemplate($tplId);
                            //$mpdf->addPage();
                        }
                    }

                    if(file_exists($otros_pdf)) {              
                        $pagecount = $mpdf->SetSourceFile($otros_pdf);
                        for ($i = 1; $i <= $pagecount; $i++) {
                            $tplId = $mpdf->ImportPage($i);
                            $specs = $mpdf->getTemplateSize($tplId);
                            $mpdf->addPage($specs['orientation']);
                            $mpdf->UseTemplate($tplId);
                            //$mpdf->SetPageTemplate($tplId);
                            //$mpdf->addPage();
                        } 
                    }

                    if (file_exists($otros_pdf) || file_exists($expediente_pdf)) {
                        $mpdf->Output($expediente_pdf, \Mpdf\Output\Destination::FILE);
                        if(file_exists($otros_pdf) && unlink($otros_pdf)) {
                            $doc_juicio = DocJuicio::where('juicio_id', $juicio->id)->where("doc_tipo_id", 3)->first();
                            $doc_juicio->delete();
                        }
                    }
                  
                }
            } catch (Exception $e) {
                $this->info('Ocurrio un error al intentar agregar el archivo Otros a Expediente: '.$e->getMessage());
            }
        })->dailyAt('00:01');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
