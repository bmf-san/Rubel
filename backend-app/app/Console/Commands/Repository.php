<?php

namespace Rubel\Console\Commands;

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
        $contractFileName = 'app/Repositories/Contracts/' . $modelName . 'RepositoryContract.php';
        $eloquentFileName = 'app/Repositories/Eloquent/' . $modelName . 'Repository.php';

        if ($modelName === '' || is_null($modelName) || empty($modelName)) {
            $this->error('Model name invalid..!');
        }

        if (! file_exists('app/Repositories/Contracts') && ! file_exists('app/Repositories/Eloquent')) {
            mkdir('app/Repositories/Contracts', 0775, true);
            mkdir('app/Repositories/Eloquent', 0775, true);

            $this->createFiles($modelName, $contractFileName, $eloquentFileName);
        } else {
            $this->createFiles($modelName, $contractFileName, $eloquentFileName);
        }
    }

    public function createFiles($modelName, $contractFileName, $eloquentFileName)
    {
        if(! file_exists($contractFileName) && ! file_exists($eloquentFileName)) {
            $contractFileContent = "<?php\n\nnamespace Rubel\\Repositories\\Contracts;\n\ninterface " . $modelName . "RepositoryContract\n{\n}";

            file_put_contents($contractFileName, $contractFileContent);

            $eloquentFileContent = "<?php\n\nnamespace Rubel\\Repositories\\Eloquent;\n\nuse Rubel\\Repositories\\Contracts\\".$modelName."RepositoryContract;\n\nclass " . $modelName . "Repository implements " . $modelName . "RepositoryContract\n{\n}";

            file_put_contents($eloquentFileName, $eloquentFileContent);

            $this->info('Repository files created successfully.');
        } else {
            $this->error('Repository files already exists.');
        }
    }
}
