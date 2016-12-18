<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Repository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {modelName : The name of the model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create repository files.';

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
     * @return mixed
     */
    public function handle()
    {
        $modelName = $this->argument('modelName');

        if ($modelName === '' || is_null($modelName) || empty($modelName)) {
            $this->error('Model name invalid..!');
        }

        if (! file_exists('app/Http/Repositories/Contracts') && ! file_exists('app/Http/Repositories/Eloquent')) {

            mkdir('app/Http/Repositories/Contracts', 0775, true);
            mkdir('app/Http/Repositories/Eloquent', 0775, true);

            $contractFileName = 'app/Http/Repositories/Contracts/' . $modelName . 'RepositoryContract.php';
            $eloquentFileName = 'app/Http/Repositories/Eloquent/' . $modelName . 'Repository.php';

            if(! file_exists($contractFileName) && ! file_exists($eloquentFileName)) {
                $contractFileContent = "<?php\n\nnamespace App\\Http\\Repositories\\Contracts;\n\ninterface " . $modelName . "RepositoryContract\n{\n}";

                file_put_contents($contractFileName, $contractFileContent);

                $eloquentFileContent = "<?php\n\nnamespace App\\Http\\Repositories\\Eloquent;\n\nuse App\\Repositories\\Contracts\\".$modelName."RepositoryContract;\n\nclass " . $modelName . "Repository implements " . $modelName . "RepositoryContract\n{\n}";

                file_put_contents($eloquentFileName, $eloquentFileContent);

                $this->info('Repository files created successfully.');
            } else {
                $this->error('Repository files already exists.');
            }
        } else {
            $contractFileName = 'app/Http/Repositories/Contracts/' . $modelName . 'RepositoryContract.php';
            $eloquentFileName = 'app/Http/Repositories/Eloquent/' . $modelName . 'Repository.php';

            if(! file_exists($contractFileName) && ! file_exists($eloquentFileName)) {
                $contractFileContent = "<?php\n\nnamespace App\\Http\\Repositories\\Contracts;\n\ninterface " . $modelName . "RepositoryContract\n{\n}";

                file_put_contents($contractFileName, $contractFileContent);

                $eloquentFileContent = "<?php\n\nnamespace App\\Http\\Repositories\\Eloquent;\n\nuse App\\Repositories\\Contracts\\".$modelName."RepositoryContract;\n\nclass " . $modelName . "Repository implements " . $modelName . "RepositoryContract\n{\n}";

                file_put_contents($eloquentFileName, $eloquentFileContent);

                $this->info('Repository files created successfully.');
            } else {
                $this->error('Repository files already exists.');
            }
        }
    }
}
