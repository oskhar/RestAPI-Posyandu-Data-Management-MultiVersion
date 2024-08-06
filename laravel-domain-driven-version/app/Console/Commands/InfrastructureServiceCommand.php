<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InfrastructureServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'infrastructure:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a new service class in the Infrastructure layer';

    /**
     * The console command visibility.
     *
     * @var boolean
     */
    protected $hidden = false;

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Get the service name from the input argument
        $serviceName = $this->argument('name');

        // Define the path to the stub file
        $stubPath = resource_path('stubs/infrastructure/service.stub');

        // Define the target path for the new service file
        $targetPath = app_path("Infrastructure/Services/{$serviceName}.php");

        // Check if the service already exists
        if (File::exists($targetPath)) {
            $this->error("Service {$serviceName} already exists!");
            return 1;
        }

        // Get the contents of the stub file
        $stubContent = File::get($stubPath);

        // Replace placeholder with the service name
        $serviceContent = str_replace('{{ class }}', $serviceName, $stubContent);

        // Ensure the directory exists
        File::ensureDirectoryExists(dirname($targetPath));

        // Create the service file
        File::put($targetPath, $serviceContent);

        // Output success message
        $this->info("Service {$serviceName} created successfully.");

        return 0;
    }
}
