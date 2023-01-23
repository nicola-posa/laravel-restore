<?php

namespace DefStudio\Restore\Commands;

use DefStudio\Restore\Tasks\Restore\RestoreJob;
use Illuminate\Console\Command;
use Storage;

class RestoreCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'restore:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the restore.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       // $disk = Storage::build([
       //          'driver' => 'local',
       //          'root' => base_path('restore'),
       //  ]);

        if (!Storage::exists('restore-temp')) {
            Storage::makeDirectory('restore-temp');
        }

        $this->info('Move file zip into src/storage/app/restore-temp');

        $restoreJob = new RestoreJob();

        $restoreJob->run();

        return Command::SUCCESS;
    }
}
