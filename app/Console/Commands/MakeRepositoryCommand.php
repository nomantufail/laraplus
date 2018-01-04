<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeRepositoryCommand extends Command
{

    protected $files = null;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name} {--mapper=} {interface?} {factory?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository';

    /**
     * Create a new command instance.
     * @param Filesystem $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function getInterfaceName(){
        if($this->argument('interface') != null)
            return $this->argument('interface');
        return str_replace_last('Repository','RepoInterface',$this->argument('name'));
    }

    public function getModelMapperName(){
        return ($this->option('mapper'))?$this->option('mapper'):null;
    }

    public function getFactoryName(){
        if($this->argument('factory') != null)
            return $this->argument('factory');
        return str_replace_last('Repository','RepoFactory',$this->argument('name'));
    }

    public function createRepository(){
        $stub = $this->files->get($this->getStub());
        $stub = str_replace('DummyClass', $this->argument('name'), $stub);
        if($this->getModelMapperName()){
            $stub = str_replace('DummyNamespaceMapper', 'use ModelMappers\\'.$this->getModelMapperName().';', $stub);
            $stub = str_replace('DummyCreateMapperObject', 'new '.ucfirst($this->getModelMapperName()).'()', $stub);
            $stub = str_replace('dummyObjectMapper', lcfirst($this->getModelMapperName()), $stub);
        }else{
            $stub = str_replace('DummyNamespaceMapper', '', $stub);
            $stub = str_replace('dummyObjectMapper', 'modelMapper', $stub);
            $stub = str_replace('DummyCreateMapperObject', 'null', $stub);
        }

        //setting up interface
        $stub = str_replace('InterfaceNamespace', 'use RepoInterfaces\\'.$this->getInterfaceName().';', $stub);
        $stub = str_replace('DummyInterface', $this->getInterfaceName(), $stub);

        $this->files->put(app_path('Repositories/'.$this->argument('name').'.php'), $stub);
    }

    public function shouldCreateInterface(){
        //todo: implement decision making..
        return true;
    }

    public function shouldCreateFactory(){
        //todo: implement decision making..
        return true;
    }

    public function createInterface(){
        $stub = $this->files->get(app_path('Stubs/RepoInterface.stub'));
        $stub = str_replace('DummyInterface', $this->getInterfaceName(), $stub);
        if(!file_exists(app_path('Repositories/Interfaces/'.$this->getInterfaceName().'.php'))){
            $this->files->put(app_path('Repositories/Interfaces/'.$this->getInterfaceName().'.php'), $stub);
        }
    }

    public function createFactory(){
        $stub = $this->files->get(app_path('Stubs/RepoFactory.stub'));
        $stub = str_replace('DummyRepository', $this->argument('name'), $stub);
        $stub = str_replace('DummyFactory', $this->getFactoryName(), $stub);
        if(!file_exists(app_path('Repositories/Factories/'.$this->getFactoryName().'.php'))){
            $this->files->put(app_path('Repositories/Factories/'.$this->getFactoryName().'.php'), $stub);
        }
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if($this->shouldCreateFactory()){
            $this->createFactory();
            echo "Factory created.\n";
        }
        if($this->shouldCreateInterface()){
            $this->createInterface();
            echo "Interface created.\n";
        }
        $this->createRepository();
        echo "Repository created.\n";
    }

    public function getStub()
    {
        return app_path('Stubs/repository.stub');
    }
}
