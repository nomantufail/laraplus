<?php

namespace App\Console;

use App\Console\Commands\AddColumnInMigrationCommand;
use App\Console\Commands\AddEmModelPropertyCommand;
use App\Console\Commands\AddModelPropertiesCommand;
use App\Console\Commands\MakeControllerCommand;
use App\Console\Commands\MakeEmModelCommand;
use App\Console\Commands\MakeMigrationCommand;
use App\Console\Commands\MakeModelCommand;
use App\Console\Commands\MakeModelMapperCommand;
use App\Console\Commands\MakeRepositoryCommand;
use App\Console\Commands\MakeRequestCommand;
use App\Console\Commands\MakeViewCommand;
use App\Console\Commands\MakeApiTestCommand;
use App\Console\Commands\MakeSeederCommand;
use Illuminate\Console\Scheduling\Schedule;;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        MakeRepositoryCommand::class,
        MakeRequestCommand::class,
        MakeControllerCommand::class,
        MakeModelCommand::class,
        MakeEmModelCommand::class,
        MakeModelMapperCommand::class,
        MakeMigrationCommand::class,
        AddEmModelPropertyCommand::class,
        AddModelPropertiesCommand::class,
        AddColumnInMigrationCommand::class,
        MakeViewCommand::class,
        MakeApiTestCommand::class,
        MakeSeederCommand::class
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
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
