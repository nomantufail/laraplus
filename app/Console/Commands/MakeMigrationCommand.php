<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Libs\Helper;

class MakeMigrationCommand extends Command
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
    protected $signature = 'make:migration {name?} {--create=} {--columns=} {--model=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new migration';

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

    public function askTableName($prop){
        $reference_table = $this->ask('what is the reference table for foreign key "{'.$prop.'}"');
        if(!$this->tableExists($reference_table)){
            echo "Incorrect table name \n";
            return $this->askTableName($prop);
        }else{
            return $reference_table;
        }
    }

    public function createForiegnKey($column){
        $reference_table = str_replace('_id', 's',$column);
        if(!$this->tableExists($reference_table))
            $reference_table = str_replace('_id', 'es',$column);
        if(!$this->tableExists($reference_table)){
            $reference_table = $this->askTableName($column);
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
        }else if(strtolower($query_parts[1]) == strtolower('bool')){
            return '$table->boolean(\''.$column_name.'\')'.$this->computeNullableDefaults($query_parts).';';
        }else{
            return '$table->'.$query_parts[1].'(\''.$column_name.'\')'.$this->computeNullableDefaults($query_parts).';';
        }
    }

    public function createColumns($queries){
        $columns = '';
        foreach ($queries as $query){
            $columns .= "\n \t \t \t".$this->createColumn($query);
        }
        $columns .= "\n \t \t \t ".'$table->timestamps();';
        return $columns.' //DummyColumns';
    }

    public function getLargestNumber(){
        $largest_number = 0;
        $path = database_path('migrations');
        $objects = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path), \RecursiveIteratorIterator::SELF_FIRST);
        foreach($objects as $name => $object){
            $file_name_parts = explode('/', $name);
            $file_name = $file_name_parts[sizeof($file_name_parts) -1];
            $migration_name_parts = explode('_',$file_name);
            if(isset($migration_name_parts[4])){
                $largest_number = (intval($migration_name_parts[3]) > $largest_number)?intval($migration_name_parts[3]):$largest_number;
            }
        }
        return date('Y').'_'.date('m').'_'.date('d').'_'.($largest_number+1);
//        $order = '';
//        $microTime = microtime();
//        $parts = explode(' ',$microTime);
//        $order = $order.$parts[1].(doubleval($parts[0])*100000000);
//        return $order;
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

    public function fire()
    {


        $this->migrationName = ucfirst(($this->argument('name'))?$this->argument('name'):$this->ask('please enter migration name'));
        $this->table = ($this->option('create'))?$this->option('create'):$this->ask('please enter table name');
        $this->columns = ($this->option('columns'))?explode(' ', $this->option('columns')):explode(' ', $this->ask('please enter columns. e.g(id:int name:string)'));
        $this->model = ucfirst($this->option('model'));
        $columns = $this->createColumns($this->getColumns());

        $stub = $this->files->get($this->getStub());
        $stub = str_replace('DummyMigration', ucfirst($this->getMigrationName()), $stub);
        $stub = str_replace('DummyTable', $this->getTableName(), $stub);
        $stub = str_replace('DummyColumns', $columns, $stub);

        if(!$this->migrationExists($this->getMigrationName())){
            $this->files->put(database_path('migrations/'.$this->getLargestNumber()."_".$this->getMigrationName().'.php'), $stub);
        }

        echo "Laravel migration created \n\n";

        if($this->getModelName()){
            if(!$this->modelExists($this->getModelName())){
                $this->createLaravelModel();
                $this->createSeeder();
            }
        }else{
            if($this->confirm('Do you want to create a model for migration: {'.$this->getMigrationName().'}?')){
                $this->createLaravelModel();
                $this->createSeeder();
            }
        }

    }

    public function createSeeder(){
        $columns = join(' ',$this->getColumns());
        $laraModel = $this->getModelName();
        $seederName = str_replace("Table", "Seeder",str_replace("Create","",$this->getMigrationName()));
        $this->call('make:seeder', [
            'name' => $seederName,
            'laraModel' => $laraModel,
            '--columns' => $columns
        ]);
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

    public function createLaravelModel(){
        $options = [
            'table' => $this->getTableName(),
            'props' => join(' ',$this->getColumns())
        ];

        if($this->getModelName() != '' || $this->getModelName() != null){
            $options['name'] = $this->getModelName();
        }

        $this->call('make:model', $options);
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return app_path('Stubs/migration.stub');
    }
}
