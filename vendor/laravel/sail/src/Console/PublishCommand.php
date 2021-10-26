<?php

namespace Laravel\Sail\Console;

use Illuminate\Console\Command;

class PublishCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sail:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish the Laravel Sail Docker files';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->call('vendor:publish', ['--tag' => 'sail-docker']);

        file_put_contents(
<<<<<<< HEAD
            $this->laravel->basePath('docker-compose.yml'),
            str_replace(
                [
                    './vendor/laravel/sail/runtimes/8.1',
=======
            $this->laravel->basePath('docker-compose.yml'), 
            str_replace(
                [
>>>>>>> e67035c4ea184912f964e44a044cb8c2822baaa3
                    './vendor/laravel/sail/runtimes/8.0',
                    './vendor/laravel/sail/runtimes/7.4',
                ],
                [
<<<<<<< HEAD
                    './docker/8.1',
                    './docker/8.0',
                    './docker/7.4',
=======
                    './docker/8.0',
                    './docker/7.4', 
>>>>>>> e67035c4ea184912f964e44a044cb8c2822baaa3
                ],
                file_get_contents($this->laravel->basePath('docker-compose.yml'))
            )
        );
    }
}
