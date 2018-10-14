<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use NuWorks\FeatureTestPrimer\MySQLDatabaseReader;

class SetupFeatureTestPrimer extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feature-test:setup-primer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /** @var MySQLDatabaseReader */
    private $reader;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(MySQLDatabaseReader $reader)
    {
        parent::__construct();
        $this->reader = $reader;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $pdo = DB::connection('test_db')->getPdo();

        $this->reader->setPDO($pdo);
        $this->reader->getDatabaseTables('test_db');
    }

}
