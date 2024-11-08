<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GuestInstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'guest:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'First installation';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('key:generate');
        $this->call('migrate');
        return self::SUCCESS;
    }
}
