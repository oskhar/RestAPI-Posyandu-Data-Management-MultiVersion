<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InfrastructureMiddlewareCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'infrastructure:middleware {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a new middleware class in the Infrastructure layer';

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
        // Get the middleware name from the input argument
        $middlewareName = $this->argument('name');

        // Define the path to the stub file
        $stubPath = resource_path('stubs/infrastructure/middleware.stub');

        // Define the target path for the new middleware file
        $targetPath = app_path("Infrastructure/Middleware/{$middlewareName}.php");

        // Check if the middleware already exists
        if (File::exists($targetPath)) {
            $this->error("Middleware {$middlewareName} already exists!");
            return 1;
        }

        // Get the contents of the stub file
        $stubContent = File::get($stubPath);

        // Replace placeholder with the middleware name
        $middlewareContent = str_replace('{{ class }}', $middlewareName, $stubContent);

        // Ensure the directory exists
        File::ensureDirectoryExists(dirname($targetPath));

        // Create the middleware file
        File::put($targetPath, $middlewareContent);

        // Output success message
        $this->info("Middleware {$middlewareName} created successfully.");

        return 0;
    }
}
