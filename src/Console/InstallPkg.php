<?php

namespace RodrigoXdn\Laravel\Console;

use Illuminate\Console\Command;

class InstallPkg extends Command
{
	protected $signature = 'pkg:install';

	protected $description = 'Install Xdn Package.';

	public function handle()
    {
        $this->info('Installing Xdn Package...');

        $this->call('vendor:publish', [
            '--provider' => "RodrigoXdn\Laravel\XdnServiceProvider"
        ]);

        $this->info('Installed Xdn Package.');
    }
}