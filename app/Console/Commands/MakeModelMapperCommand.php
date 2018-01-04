<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Libs\Helper;

class MakeModelMapperCommand extends Command
{
    protected $files = null;
    private $modelName = '';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:modelmapper {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Laravel model';

    /**
     * Create a new command instance.
     * @param Filesystem $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function getModelName(){
        return $this->modelName;
    }

    public function getModelMapperName(){
        return ucfirst($this->getModelName()).'Mapper';
    }

    public function fire()
    {
        $this->modelName = ($this->argument('name'))?$this->argument('name'):$this->ask('please enter model name');

        $stub = $this->files->get($this->getStub());
        $stub = str_replace('DummyMapper', $this->getModelMapperName(), $stub);
        $stub = str_replace('DummyModel', ucfirst($this->getModelName()), $stub);
        if(!file_exists(app_path('ModelMappers/'.$this->getModelMapperName().'.php'))){
            $this->files->put(app_path('ModelMappers/'.$this->getModelMapperName().'.php'), $stub);
        }
        echo "Model mapper created \n";
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return app_path('Stubs/modelMapper.stub');
    }
}
