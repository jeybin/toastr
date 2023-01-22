<?php

namespace Jeybin\Toastr\Console;

use Illuminate\Console\Command;

class PublishToastrProviders extends Command {

    protected $signature = 'toastr:install';

    protected $description = 'Publishing toastr providers';

    public function handle() {
        $this->info('Publishing providers');

        $this->call('vendor:publish', [
            '--provider' => "Jeybin\Toastr\Providers\ToastrServiceProvider",
            '--force'=>true
        ]);

        $this->info('Installed !');
    }
}