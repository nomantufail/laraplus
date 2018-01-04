<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Libs\Helper;

class AddColumnInMigrationCommand extends Command
{
    protected $files = null;
    private $migrationName = '';
    private $table = '';
    private $columns = [];
    private $model = '';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'addColumns:migration {name?} {--table=} {--columns=} {--model=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a column in migration';

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

    public function getColumns(){
        return $this->columns;
    }

    public function getModelName(){
        return $this->model;
    }

    public function getMigrationName(){
        return $this->migrationName;
    }

    public function createPrimaryKey(){
        return '$table->increments(\'id\');';
    }
    public function createTimeStamps(){
        return '$table->timestamps();';
    }

    public function createForiegnKey($column){
        $reference_table = $this->ask('what is the reference table for foreign key "{'.$column.'}"');
        if(!$this->tableExists($reference_table)){
            //todo: create parent table first?
        }
        return '$table->integer(\''.$column.'\')->unsigned();
                    $table->foreign(\''.$column.'\',\''.uniqid('fk_').'\')->references(\'id\')->on(\''.$reference_table.'\')->onDelete(\'cascade\');';
    }

    public function isForeignKey($column){
        $column_parts = explode('_', $column);
        return ($column_parts[sizeof($column_parts)-1] == 'id');
    }

    public function computeNullableDefaults($queryParts)
    {
        $nullable = '';
        $default = '';
        if(isset($queryParts[2])){
            $option = $queryParts[2];
            if($option == 'unique'){
                $default = '->unique()';
            }else if($option != 'notnull'){
                $default = '->default(\''.$option.'\')';
            }
            return $nullable.$default;
        }else{
            $nullable = (!isset($option))?'->nullable()':'';
        }
        return $nullable.$default;
    }
    public function createColumn($query){
        $query_parts = explode(':',$query);
        $column_name = Helper::camlecaseToUnderscore($query_parts[0]);
        if($column_name == 'id'){
            return $this->createPrimaryKey();
        }
        if($this->isForeignKey($column_name)){
            return $this->createForiegnKey($column_name);
        }
        if(strtolower($query_parts[1]) == strtolower('int')){
            return '$table->integer(\''.$column_name.'\')'.$this->computeNullableDefaults($query_parts).';';
        }else{
            return '$table->'.$query_parts[1].'(\''.$column_name.'\')'.$this->computeNullableDefaults($query_parts).';';
        }
    }

    public function createColumns($queries){
        $columns = '';
        foreach ($queries as $query){
            $columns .= "\n \t \t \t".$this->createColumn($query);
        }
        return $columns.' //DummyColumns';
    }

    public function getLargestNumber(){
        $order = '';
        $microTime = microtime();
        $parts = explode(' ',$microTime);
        $order = $order.$parts[1].(doubleval($parts[0])*100000000);
        return $order;
    }

    public function migrationExists($migration){
        $path = database_path('migrations');
        $objects = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path), \RecursiveIteratorIterator::SELF_FIRST);
        foreach($objects as $name => $object){
            $file_content = file_get_contents($object->getRealPath());
            if (strpos($file_content, $migration) !== false) {
                return true;
            }
        }
        return false;
    }

    public function getMigrationRealPath($migration){
        $path = database_path('migrations');
        $objects = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path), \RecursiveIteratorIterator::SELF_FIRST);
        foreach($objects as $name => $object){
            $file_content = file_get_contents($object->getRealPath());
            if (strpos($file_content, $migration) !== false) {
                return $object->getRealPath();
            }
        }
        return null;
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
    public function getMigrationRealPathByTable($table){
        $table = 'create(\''.$table.'\'';
        $path = database_path('migrations');
        $objects = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path), \RecursiveIteratorIterator::SELF_FIRST);
        foreach($objects as $name => $object){
            $file_content = file_get_contents($object->getRealPath());
            if (strpos(trim($file_content), $table) !== false) {
                return $object->getRealPath();
            }
        }
        return null;
    }

    public function fire()
    {
        $this->columns = ($this->option('columns'))?explode(' ', $this->option('columns')):explode(' ', $this->ask('please enter columns. e.g(id:int name:string)'));
        $this->model = ucfirst($this->option('model'));
        $columns = $this->createColumns($this->getColumns());

        $stubPath = $this->getStub();
        $stub = $this->files->get($stubPath);
        $stub = str_replace('//DummyColumns', $columns, $stub);
        $this->files->put($stubPath, $stub);

        echo "Columns created in migration \n\n";

        if($this->getModelName()){
            if(!$this->modelExists($this->getModelName())){
                $this->addPropsInLaravelModel();
            }
        }else{
            if($this->confirm('Do you want to add these properties in laravel model as well?')){
                $this->addPropsInLaravelModel();
            }
        }
    }

    public function modelExists($model){
        $path = app_path('Db/LaraModels');
        $objects = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path), \RecursiveIteratorIterator::SELF_FIRST);
        foreach($objects as $name => $object){
            if(basename($name,'.php') == $model)
                return true;
        }
        return false;
    }

    public function addPropsInLaravelModel(){
        $this->call('addProps:model', [
            'props' => join(' ',$this->getColumns())
        ]);
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        $stub = '';
        if($this->argument('name')){
            $realPath = $this->getMigrationRealPath($this->argument('name'));
            if($realPath){
                $stub = $realPath;
            }
        }else if($this->option('table')){
            $realPath = $this->getMigrationRealPathByTable($this->option('table'));
            if($realPath){
                $stub = $realPath;
            }
        }else{
            $table = $this->ask('system was unable to find migration, please provide the table name: ');
            $realPath = $this->getMigrationRealPathByTable($table);
            if($realPath){
                $stub = $realPath;
            }else{
                dd("no such table found. please create it first.");
            }
        }
        return $stub;
    }
}
