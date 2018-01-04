<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Libs\Helper;

class MakeModelCommand extends Command
{
    protected $files = null;
    private $modelName = '';
    private $table = '';
    private $props = [];
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:model {name?} {table?} {props?}';

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

    public function getTableName(){
        return $this->table;
    }

    public function getProps(){
        return $this->props;
    }

    public function getModelName(){
        return $this->modelName;
    }
    public function getPropsWithTypes(){
        return $this->props;
    }

    public function getFillables(){
        $props = '';
        foreach ($this->getProps() as $key => $pwt) {
            $prop_n_type = explode(':', $pwt);
            if($prop_n_type[0] != 'id'){
                $props .= '\''.$prop_n_type[0].'\'';
                if($key+1 < sizeof($this->getProps())){
                    $props .= ', ';
                }
            }
        }
        return $props.'/*DummyFillables*/';
    }

    public function isForeignKey($column){
        $column_parts = explode('_', $column);
        if(sizeof($column_parts) <= 1)
            return false;
        return ($column_parts[sizeof($column_parts)-1] == 'id');
    }

    public function createRelationship($prop, $model){
        $funName = Helper::strToCamelCase(str_replace('_id', '', $prop));
        return 'public function '.$funName.'(){
            return $this->belongsTo('.$model.'::class, \''.$prop.'\');
        }';
    }

    public function createReverseRelation($column, $modelPath){
        $funName = lcfirst($this->getModelName());
        $relation = 'public function '.$funName.'s(){
            return $this->hasMany('.$this->getModelName().'::class, \''.$column.'\');
        }';

        $stub = $this->files->get($modelPath);
        $stub = str_replace('//DummyRelationship', "\n \n \t".$relation.'//DummyRelationship', $stub);
        $this->files->put($modelPath, $stub);
    }

    public function askTableName($prop){
        $reference_table = $this->ask('what is the reference table for foreign key "{'.$prop.'}"');
        $modelPath = $this->findModel($reference_table);
        if($modelPath == null){
            echo "Incorrect table name \n";
            return $this->askTableName($prop);
        }else{
            return $modelPath;
        }
    }

    public function getRelationships(){
        $relationships = '';
        foreach($this->getProps() as $key => $prop){
            $prop = explode(':', $prop)[0];
            if($this->isForeignKey($prop)){
                $model_path = $this->findModel(str_replace('_id', 's',$prop));
                if($model_path == null)
                    $model_path = $this->findModel(str_replace('_id', 'es',$prop));
                if($model_path == null)
                    $model_path = $this->askTableName($prop);

                $this->createReverseRelation($prop, $model_path);
                $relationships.= "\n \n \t ".$this->createRelationship($prop, basename($model_path,'.php'));
            }
        }
        return $relationships;
    }

    public function foreignKeysExists(){
        foreach ($this->getProps() as $prop){
            if(strpos($prop,'_id'))
                return true;
        }
        return false;
    }

    public function fire()
    {
        $this->modelName = ucfirst(($this->argument('name'))?$this->argument('name'):$this->ask('please enter model name'));
        $this->table = ($this->argument('table'))?$this->argument('table'):$this->ask('please enter table name');
        $this->props = ($this->argument('props'))?explode(' ', $this->argument('props')):explode(' ', $this->ask('please enter model properties. e.g(id:int name:string)'));


        $stub = $this->files->get($this->getStub());
        $stub = str_replace('DummyClass', ucfirst($this->getModelName()), $stub);
        $stub = str_replace('DummyTable', $this->getTableName(), $stub);
        $stub = str_replace('DummyFillables', $this->getFillables(), $stub);
        if($this->foreignKeysExists()){
            if($this->confirm('Do you want to create relationships for this model?')){
                $stub = str_replace('DummyRelationship', $this->getRelationships().'//DummyRelationship', $stub);
            }
        }
        if(!file_exists(app_path('Db/LaraModels/'.$this->getModelName().'.php'))){
            $this->files->put(app_path('Db/LaraModels/'.ucfirst($this->getModelName()).'.php'), $stub);
        }
        echo "Laravel model created \n";

        $this->createEmrevoModel();

        $this->createModelMapper();

        if(!$this->tableExists($this->getTableName())){
            if($this->confirm('Do you want to create the migration for this model?')){
                $this->createMigration('Create'.$this->getModelName().'Table', $this->getTableName(), join(' ',$this->getProps()), $this->getModelName());
            }
        }
    }

    public function tableExists($table){
        $path = database_path('migrations');
        $objects = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path), \RecursiveIteratorIterator::SELF_FIRST);
        foreach($objects as $name => $object){
            $file_content = file_get_contents($object->getRealPath());
            if (strpos(trim($file_content), '\''.$table.'\'') !== false) {
                return true;
            }
        }
        return false;
    }
    public function findModel($table){
        $path = app_path('Db/LaraModels');
        $objects = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path), \RecursiveIteratorIterator::SELF_FIRST);
        foreach($objects as $name => $object){
            $file_content = file_get_contents($object->getRealPath());
            if (strpos(trim($file_content), '\''.$table.'\'') !== false) {
                return $name;
            }
        }
        return null;
    }

    public function createMigration($name, $table, $columns, $model){
        $this->call('make:migration', [
            '--create' => $table,
            'name' => $name,
            '--columns' => $columns,
            '--model' => $model
        ]);
    }

    public function createEmrevoModel(){
        $this->call('make:emmodel', [
            'name' => $this->getModelName(),
            'props' => join(' ',$this->getProps())
        ]);
    }

    public function createModelMapper(){
        $this->call('make:modelmapper', [
            'name' => $this->getModelName()
        ]);
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return app_path('Stubs/model.stub');
    }
}
