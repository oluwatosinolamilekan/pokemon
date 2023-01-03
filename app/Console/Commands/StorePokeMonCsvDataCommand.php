<?php

namespace App\Console\Commands;

use App\Actions\StorePokeMon;
use Illuminate\Console\Command;

class StorePokeMonCsvDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'store:pokemon';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     * @throws \Exception
     */
    public function handle()
    {
        $result = (new StorePokeMon())->run();
        $this->output->writeln(
            'Done! - '.
            'in '.round($result, 2).' secs.'
        );
        return 0;
    }
}
