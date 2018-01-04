<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Routing\Console\ControllerMakeCommand;
use Symfony\Component\Finder\Iterator\RecursiveDirectoryIterator;

class MakeViewCommand extends Command
{

    protected $files = null;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:view {name?} {--parent=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a view';

    /**
     * Create a new command instance.
     * @param Filesystem $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function getPath(){
        return str_replace('.','/',$this->argument('name'));
    }

    protected function getExtraFolders(){
        $folders = [];
        $parts = explode('.',$this->argument('name'));
        for ($i = 0 ; $i < sizeof($parts)-1; $i++){
            $folders[] = $parts[$i];
        }
        return $folders;
    }

    public function handle(){
        $stub = $this->files->get($this->getStub());
        $parent = ($this->option('parent'))?$this->option('parent'):'parent';
        $stub = str_replace('DummyExtends', $parent, $stub);
        $stub = str_replace('DummyWelcomeText', $this->argument('name'), $stub);
        if(!file_exists(resource_path('views/'.join('/',$this->getExtraFolders()))))
            mkdir(resource_path('views/'.join('/',$this->getExtraFolders())), 0777, true);
        if(!file_exists(resource_path('views/'.$this->getPath().'.blade.php'))){
            $this->files->put(resource_path('views/'.$this->getPath().'.blade.php'), $stub);
            dd('View created successfully');
        }
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return app_path('Stubs/view.stub');
    }
}
