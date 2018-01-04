<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Libs\Helper;

class AddEmModelPropertyCommand extends Command
{

    protected $files = null;
    private $modelName = '';
    private $props = [];
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'addProps:emmodel {model?} {props?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'add properties in a model';

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
            case 'string':
                return '\'\'';
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
                $props .= "\n \t" . 'private $' . Helper::strToCamelCase($prop_n_type[0]) . ' = ' . $this->computeDefaultValue($prop_n_type[1]).';';
            }
        return $props.'//DummyProps';
    }

    public function getConstructArgs(){
        $props = ($this->numOfExistingProps() > 0)?', ':'';
        foreach ($this->getPropsInput() as $key => $pwt) {
            $prop_n_type = explode(':', $pwt);
            $props .= '$' . Helper::strToCamelCase($prop_n_type[0]) . ' = ' . $this->computeDefaultValue($prop_n_type[1]);
            if($key+1 < sizeof($this->getPropsInput())){
                $props .= ', ';
            }
        }
        return $props.' /*DummyConstructArgs*/';
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
        $props = ($this->numOfExistingProps() > 0)?', ':'';
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
            $dummyType = (ctype_lower($prop_n_type[1][0]))?'$'.$prop_n_type[0]:$prop_n_type[1];
            $stub = str_replace('DummyType', $dummyType, $stub);
            $stub = str_replace('DummyProp', Helper::strToCamelCase($prop_n_type[0]), $stub);
            $stub = str_replace('DummyGetter', 'get'.ucfirst(Helper::strToCamelCase($prop_n_type[0])), $stub);
            $stub = str_replace('DummySetter', 'set'.ucfirst(Helper::strToCamelCase($prop_n_type[0])), $stub);
            $stub = str_replace('DummyArg', '$'.Helper::strToCamelCase($prop_n_type[0]), $stub);
            $getterSetters.=$stub."\n\n";
        }
        return $getterSetters."\n".'//DummyGetterSetters';
    }

    public function numOfExistingProps(){
        $model = "\\Models\\".$this->getModelName();
        $object = new $model();
        $reflect = new \ReflectionClass($object);
        return sizeof($reflect->getProperties());
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $this->modelName = ($this->argument('model'))?$this->argument('model'):$this->ask('please enter model name');
        $this->props = ($this->argument('props'))?explode(' ', $this->argument('props')):explode(' ', $this->ask('please enter model properties. e.g(id:int name:string)'));

        $stub = $this->files->get($this->getStub());
        $stub = str_replace('//DummyProps', $this->getProps(), $stub);
        $stub = str_replace('/*DummyConstructArgs*/', $this->getConstructArgs(), $stub);
        $stub = str_replace('//DummyConstructSetters', $this->getConstructSetters(), $stub);
        $stub = str_replace('//DummyToArray', $this->getPropsArray(), $stub);
        $stub = str_replace('//DummyGetterSetters', $this->getGetterSetters(), $stub);
        $this->files->put($this->getStub(), $stub);

        echo "Properties added to emrevo model. \n";
    }

    public function getStub()
    {
        return app_path('Models/'.$this->getModelName().'.php');
    }

    public function getGetterSetterStub(){
        return app_path('Stubs/em.model.setter_getter.stub');
    }
}
