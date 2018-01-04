<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Libs\Helper;

class MakeAppModelCommand extends Command
{

    protected $files = null;
    private $modelName = '';
    private $fullModelPath = '';
    private $props = [];
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:app-model {name?} {props?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new app model';

    /**
     * Create a new command instance.
     * @param Filesystem $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function getPropsInput(){
        return $this->props;
    }

    public function getModelName(){
        return $this->modelName;
    }

    public function computeDefaultValue($type){
        switch ($type){
            case 'int':
                return 0;
                break;
            case 'bool':
                return 0;
                break;
            default:
                return 'null';
                break;
        }
    }

    public function getPropsWithTypes(){
        return $props_with_types = explode(',', $this->getPropsInput());
    }

    public function getProps(){
        $props = '';
            foreach ($this->getPropsInput() as $pwt) {
                $prop_n_type = explode(':', $pwt);
                $default_value = ($prop_n_type[0] == 'id')?'null':$this->computeDefaultValue($prop_n_type[1]);
                $props .= "\n \t" . 'private $' . Helper::strToCamelCase($prop_n_type[0]) . ' = ' . $default_value.';';
            }
        return $props.'//DummyProps';
    }

    public function getConstructArgs(){
        $props = '';
        foreach ($this->getPropsInput() as $key => $pwt) {
            $prop_n_type = explode(':', $pwt);
            $default_value = ($prop_n_type[0] == 'id')?'null':$this->computeDefaultValue($prop_n_type[1]);
            $props .= '$' . Helper::strToCamelCase($prop_n_type[0]) . ' = ' . $default_value;
            if($key+1 < sizeof($this->getPropsInput())){
                $props .= ', ';
            }
        }
        return $props.'/*DummyConstructArgs*/';
    }

    public function getConstructSetters(){
        $props = '';
        foreach ($this->getPropsInput() as $pwt) {
            $prop_n_type = explode(':', $pwt);
            $props .= "\n \t \t" . '$this->set' . ucfirst(Helper::strToCamelCase($prop_n_type[0])) . '($'.Helper::strToCamelCase($prop_n_type[0]).');';
        }
        return $props.'//DummyConstructSetters';
    }

    public function getPropsArray(){
        $props = '';
        foreach ($this->getPropsInput() as $key => $pwt) {
            $prop_n_type = explode(':', $pwt);
            $props .= "\n \t \t \t" .'\''.Helper::strToCamelCase($prop_n_type[0]).'\' => '. '$this->get' . ucfirst(Helper::strToCamelCase($prop_n_type[0])) . '()';
            if($key+1 < sizeof($this->getPropsInput())){
                $props .= ', ';
            }
        }
        return $props.'//DummyToArray';
    }

    public function getGetterSetters(){
        $getterSetters = '';
        foreach ($this->getPropsInput() as $key => $pwt) {
            $prop_n_type = explode(':', $pwt);
            $stub = $this->files->get($this->getGetterSetterStub());
            $dummyType = (ctype_lower($prop_n_type[1][0]))?'$'.Helper::strToCamelCase($prop_n_type[0]):$prop_n_type[1];
            $stub = str_replace('DummyType', $dummyType, $stub);
            $stub = str_replace('DummyProp', Helper::strToCamelCase($prop_n_type[0]), $stub);
            $stub = str_replace('DummyGetter', 'get'.ucfirst(Helper::strToCamelCase($prop_n_type[0])), $stub);
            $stub = str_replace('DummySetter', 'set'.ucfirst(Helper::strToCamelCase($prop_n_type[0])), $stub);
            $stub = str_replace('DummyArg', '$'.Helper::strToCamelCase($prop_n_type[0]), $stub);
            $getterSetters.=$stub."\n\n";
        }
        return $getterSetters."\n".'//DummyGetterSetters';
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $this->fullModelPath = ($this->argument('name'))?$this->argument('name'):$this->ask('please enter model name');
        $this->modelName = self::getClassName($this->fullModelPath);
        $this->props = ($this->argument('props'))?explode(' ', $this->argument('props')):explode(' ', $this->ask('please enter model properties. e.g(id:int name:string)'));


        $stub = $this->files->get($this->getStub());
        $stub = str_replace('namespace Models', self::getModelNameSpace($this->fullModelPath), $stub);
        $stub = str_replace('DummyModel', ucfirst($this->getModelName()), $stub);
        $stub = str_replace('DummyProps', $this->getProps(), $stub);
        $stub = str_replace('DummyConstructArgs', $this->getConstructArgs(), $stub);
        $stub = str_replace('DummyConstructSetters', $this->getConstructSetters(), $stub);
        $stub = str_replace('DummyToArray', $this->getPropsArray(), $stub);
        $stub = str_replace('DummyGetterSetters', $this->getGetterSetters(), $stub);
        if(!file_exists(app_path('Models/'.$this->fullModelPath.'.php'))){
            $this->files->put(app_path('Models/'.$this->fullModelPath.'.php'), $stub);
        }

        echo "App model created \n";
    }

    public function getStub()
    {
        return app_path('Stubs/em.model.stub');
    }

    public function getGetterSetterStub(){
        return app_path('Stubs/em.model.setter_getter.stub');
    }

    public static function getModelNameSpace($fullModelPath){
        $extraFolders = self::getExtraFolders($fullModelPath);
        if(sizeof($extraFolders) > 0){
            $extraFolders = '\\'.join('\\', $extraFolders);
        }else{
            $extraFolders = '';
        }
        return 'namespace Models'.$extraFolders;

    }
    public static function getExtraFolders($filePath){
        $folders = [];
        $parts = explode('/',$filePath);
        for ($i = 0 ; $i < sizeof($parts)-1; $i++){
            $folders[] = $parts[$i];
        }
        return $folders;
    }

    public static function getClassName($fullModelPath){
        $parts = explode('/',$fullModelPath);
        $className =  $parts[sizeof($parts)-1];       
        return $className;
    }
}
