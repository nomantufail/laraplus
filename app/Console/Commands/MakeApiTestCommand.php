<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Routing\Console\ControllerMakeCommand;
use Symfony\Component\Finder\Iterator\RecursiveDirectoryIterator;

class MakeApiTestCommand extends Command
{

    protected $files = null;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:api_test {httpMethod?} {functionName?} {route?} {--args=} {--description=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an api route';

    /**
     * Create a new command instance.
     * @param Filesystem $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function getHttpMethod(){
        $httpMethod = $this->argument('httpMethod');
        if($httpMethod == null){
            $httpMethod = $this->ask("get or post?");
        }
        return $httpMethod;
    }

    public function getRoute(){
        $route = $this->argument('route');
        if($route == null)
        {
            $route = $this->ask("please enter the route");
        }
        return $route;
    }

    public function getArgs(){
        return $this->option('args');
    }

    public function getTestDescription(){
        return $this->option('description');
    }

    public function getFunction(){
        $functionName = $this->argument('functionName');
        if($functionName == null) 
        {
            $functionName = $this->ask("please enter function name");
        }
        return $functionName;
    }

    public function getTargetedTestClassStub(){
        return base_path('tests/Feature/ApiRoutingTest.php');
    }

    public function handle(){
        $stub = $this->files->get($this->getStub());
        $stub = str_replace('DummyDescription', $this->getTestDescription(), $stub);
        $stub = str_replace('DummyFunction', $this->getFunction(), $stub);
        $stub = str_replace('DummyRoute', $this->getRoute(), $stub);
        $stub = str_replace('DummyArgs', $this->getArgs(), $stub);
        $stub = str_replace('DummyMethod', $this->getHttpMethod(), $stub);
        
        $testClassStub = $this->files->get($this->getTargetedTestClassStub());
        $testClassStub = str_replace('//DummyTest', $stub, $testClassStub);
        $this->files->put($this->getTargetedTestClassStub(), $testClassStub);
        echo("Api test created successfully \n");
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return app_path('Stubs/test.api.stub');
    }
}
