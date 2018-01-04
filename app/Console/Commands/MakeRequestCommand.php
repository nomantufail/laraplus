<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Finder\Iterator\RecursiveDirectoryIterator;

class MakeRequestCommand extends Command
{

    protected $files = null;
    /**
     * The name and signature of the console command.
     * example command: php artisan make:request Students/DummyMigRequest w.g.dummy/mig DummyMigController@dummyMig@dummy.dummy --rules="name=>required|max:30 email=>required" --auth=n
     * @var string
     */
    protected $signature = 'make:request {name} {route?} {controllerMethod?} {methodDescription?} {--rules=} {--auth=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new request';

    /**
     * Create a new command instance.
     * @param Filesystem $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    protected function getExtraFolders(){
        $folders = [];
        $parts = explode('/',$this->argument('name'));
        for ($i = 0 ; $i < sizeof($parts)-1; $i++){
            $folders[] = $parts[$i];
        }
        return $folders;
    }

    protected function getCustomNamespace()
    {
        $namespace = "";
        if(strlen(join('\\',$this->getExtraFolders())) > 0){
            $namespace = "\\".join('\\',$this->getExtraFolders());
        }
        return 'Requests'.$namespace;
    }

    public function getRequestName(){
        return explode('/',$this->argument('name'))[sizeof(explode('/',$this->argument('name')))-1];
    }

    public function getRules(){
        $rules = '';
        if($this->option('rules')){
            foreach (explode(' ',$this->option('rules')) as $rule){
                $rules.="\n \t \t \t".'\''.explode('=>',$rule)[0].'\''.' => '.'\''.explode('=>',$rule)[1].'\',';
            }
        }
        return $rules;
    }

    public function makeTest(){
        if($this->getRouteCategory() == 'api'){
            
            $options = [
                'httpMethod' => $this->getRouteType(),
                'functionName' => str_replace('/', '_',$this->getRoutePath()),
                'route' => 'api/'.$this->getRoutePath(),
                '--args' => '' //todo: args not implemented
            ];

            $this->call('make:api_test', $options);
    
        }
    }

    public function makeRequestFile(){
        $stub = $this->files->get($this->getStub());
        $stub = str_replace('DummyClass', $this->getRequestName(), $stub);
        $stub = str_replace('DummyNamespace', $this->getCustomNamespace(), $stub);
        $stub = str_replace('DummyRules', $this->getRules(), $stub);
        if($this->option('auth') == 'n')
            $stub = str_replace('DummyAuth', "\n \t \t".'$this->authenticatable = false;', $stub);
        else
            $stub = str_replace('DummyAuth', "", $stub);
        if(!file_exists(app_path('Http/Requests/'.join('/',$this->getExtraFolders()))))
            mkdir(app_path('Http/Requests/'.join('/',$this->getExtraFolders())), 0777, true);
        $this->files->put(app_path('Http/Requests/'.$this->argument('name').'.php'), $stub);
    }

    public function getRouteType(){
        $type = explode('.',$this->argument('route'))[1];
        if($type == 'g')
            return 'get';
        else
            return 'post';
    }
    public function getRoutePath(){
         return explode('.',$this->argument('route'))[2];
    }

    public function getRouteCategory(){
        $cat = explode('.',$this->argument('route'))[0];
        if($cat == 'a')
            return 'api';
        return 'web';
    }

    public function getController(){
        return explode('@',$this->argument('controllerMethod'))[0];
    }

    public function getFunction(){
        return explode('@',$this->argument('controllerMethod'))[1];
    }

    public function makeRoute(){
        //preparing new route
        $stub = $this->files->get($this->getNewRouteStub());
        $stub = str_replace('DummyType', $this->getRouteType(), $stub);
        $stub = str_replace('DummyRoute', $this->getRoutePath(), $stub);
        $stub = str_replace('DummyControllerMethod', $this->getController()."@".$this->getFunction(), $stub);
        $stub = str_replace('DummyRequestName', join('\\',$this->getExtraFolders()).((sizeof($this->getExtraFolders()) > 0)?'\\':'').$this->getRequestName(), $stub);

        //writing new route in appropriate routes file.
        $routesStub = $this->files->get($this->getRoutesStub());
        $routesStub = str_replace('//DummyNewRoute', $stub, $routesStub);

        $this->files->put($this->getRoutesStub(), $routesStub);
    }

    public function getViewName(){
        $parts = explode('@',$this->argument('controllerMethod'));
        if(isset($parts[2]))
            return $parts[2];
        return null;
    }

    public function makeControllerFunction(){
        //preparing new route
        $stub = $this->files->get($this->getNewControllerFunctionStub());
        $customNamespace = $this->getCustomNamespace();
        $stub = str_replace('DummyRequest', ((strlen($customNamespace) > 0)?'\\':'').$this->getCustomNamespace().'\\'.$this->getRequestName(), $stub);
        $stub = str_replace('DummyMethodName', $this->getFunction(), $stub);
        $stub = str_replace('DummyDescription', $this->argument('methodDescription'), $stub);

        //setting view name in cntroller function
        if($this->getRouteCategory() == "web"){
            $view = $this->getViewName();
            $stub = str_replace('DummyView', ($view)?$view:'', $stub);
        }


        //writing new route in appropriate routes file.
        if(!$this->getTargetedControllerStub()){
            $this->createNewController($this->getController());
        }
        $contStub = $this->files->get($this->getTargetedControllerStub());
        $contStub = str_replace('//DummyNewRequestMethod', $stub, $contStub);
        $this->files->put($this->getTargetedControllerStub(), $contStub);
    }

    public function getNewControllerFunctionStub(){
        if($this->getRouteType() == "api")
            return app_path('Stubs/ControllerRequestFunctionApi.stub');
        else
            return app_path('Stubs/ControllerRequestFunctionWeb.stub');
    }

    public function getTargetedControllerStub(){
        $path = app_path('Http/Controllers');
        $controllerParts = explode("\\",$this->getController());
        $objects = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path), \RecursiveIteratorIterator::SELF_FIRST);
        foreach($objects as $name => $object){
            if(basename($name,'.php') == $controllerParts[sizeof($controllerParts) -1])
                return $name;
        }
    }

    public function createNewController($controller){
        if($this->confirm('Controller not found. Do you want to create it?')){
            $controllerParts = explode("\\",$this->getController());
            $controllerName = $controllerParts[sizeof($controllerParts) -1];
            $this->call('make:controller', [
                'name' => $controllerName
            ]);
        }else{
            dd('To continue, please create the controller first');
        }
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->makeRequestFile();
        echo "Request Created successfully\n";



        if($this->argument('route')){
            $this->makeRoute();
            echo "Route Created successfully\n";
            $this->makeTest();
        }

        if($this->argument('controllerMethod')){
            $this->makeControllerFunction();
            echo "Controller Method Created successfully\n";
        }

        if($this->getViewName() != null){
            $this->call('make:view', [
                'name' => $this->getViewName()
            ]);
        }

    }

    public function getStub()
    {
        return app_path('Stubs/request.stub');
    }
    public function getNewRouteStub()
    {
        return app_path('Stubs/route.stub');
    }

    public function getRoutesStub(){
        if($this->getRouteCategory() == 'web')
            return $this->getWebRoutesStub();
        else
            return $this->getApiRoutesStub();
    }

    public function getWebRoutesStub()
    {
        return base_path('routes/web.php');
    }

    public function getApiRoutesStub()
    {
        return base_path('routes/api.php');
    }
}
