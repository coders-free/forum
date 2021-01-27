<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use Illuminate\Support\Carbon;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CategoryImport;
use App\Imports\CustomerImport;
use App\Imports\BrandImport;
use App\Imports\CodeImport;
use App\Imports\VoucherImport;

use App\Exports\VoucherTrackExport;
use App\Exports\CuponAsignadoExport;

class Kernel extends ConsoleKernel
{
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

        $schedule->call(function(){
            //Importar
            Excel::import(new CategoryImport, 'GENERADOS_DD/FORUM_CATEGORIAS.csv', 'ftp');
            Excel::import(new CustomerImport, 'GENERADOS_DD/FORUM_CLIENTES_20201217.csv', 'ftp');
            Excel::import(new BrandImport, 'GENERADOS_DD/FORUM_CUPON_20210108.csv', 'ftp');
            Excel::import(new VoucherImport, 'GENERADOS_DD/FORUM_CUPON_20210108.csv', 'ftp');
            Excel::import(new CodeImport, 'GENERADOS_DD/FORUM_CUPON_20210108.csv', 'ftp');

            //Exportar
            Excel::store(new VoucherTrackExport, 'GENERADOS_PLATAFORMA/TRACK_SITIO_' . Carbon::now()->format('Ymd') . '.csv', 'ftp');
            Excel::store(new CuponAsignadoExport, 'GENERADOS_PLATAFORMA/FORUM_CUPON_ASIGNADO_' . Carbon::now()->format('Ymd') . '.csv', 'ftp');
        })->daily();

        // $schedule->command('inspire')->hourly();
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
