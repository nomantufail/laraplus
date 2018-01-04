<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Finder\Iterator\RecursiveDirectoryIterator;

class MakeSeederCommand extends Command
{
    protected $files = null;

    private $seederName = null;
    private $laraModel = null;
    private $columns = null;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:seeder {name?} {laraModel?} {--columns=}';

    /**
     * The console command description.
     *
     * @var string  
     */
    protected $description = 'Create a seeder with fake factory';

    /**
     * Create a new command instance.
     * @param Filesystem $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function getSeederName(){
        $seederName = $this->argument('name');
        if($seederName == null){
            $seederName = $this->seederName;
            if($seederName == null){
                $this->seederName = $this->ask("please enter seeder name");
                return $this->seederName;
            }
        }
        return $seederName;
    }

    public function getLaraModel(){
        $laraModel = $this->argument('laraModel');
        if($laraModel == null){
            $laraModel = $this->laraModel;
            if($laraModel == null){
                $this->laraModel = $this->ask("please enter laravel model name");
                $laraModel = $this->laraModel;
            }
        }
        if(!$this->modelExists($laraModel)){
            echo "Model not found!";
            $this->laraModel = $this->ask("please enter laravel model name");
            $laraModel = $this->getLaraModel();
        }
        return $laraModel;
    }

    public function getTableColumns(){
        $columns = $this->option('columns');
        if($columns == null){
            $columns = $this->columns;
            if($columns == null){
                $this->columns = $this->ask("please enter columns");
                return $this->columns;
            }
        }
        return $columns;
    }

    public function getFakerValueFor($columnType){
        switch ($columnType) {
            case 'int':
                return '$faker->randomDigitNotNull';
                break;
            case 'string':
                return '$faker->sentence()';
                break;
            case 'text':
                return '$faker->paragraph()';
                break;
            case 'date':
                return '$faker->date()';
                break;
            case 'time':
                return '$faker->time()';
                break;
            case 'datetime';
                return '$faker->datetime()';
                break;
            case 'foriegnKey':
                return '$faker->randomElement(range(1,5))';
                break;
            default:
                return '0';
                break;
        }
    }

    public function isForeignKey($column){
        if($column == 'id')
            return false;
        $column_parts = explode('_', $column);
        return ($column_parts[sizeof($column_parts)-1] == 'id');
    }

    public function isPrimaryKey($column){
        return ($column == 'id');
    }

    public function createFakerValuesFor($columns){
        $fakerColumns = "";
        foreach (explode(" ", $columns) as $columnParts) {
            $type = explode(":", $columnParts)[1];
            $column = explode(":", $columnParts)[0];
            if($this->isForeignKey($column)){
                $fakerColumns.="\n\t\t"."'".$column."' => ".$this->getFakerValueFor("foriegnKey").",";
            }else if(!$this->isPrimaryKey($column)){
                $fakerColumns.="\n\t\t"."'".$column."' => ".$this->getFakerValueFor($type).",";
            }
        }
        return $fakerColumns;
    }

    public function writeFactory(){
        $tableColumns = $this->getTableColumns();
        $fakerValues = $this->createFakerValuesFor($tableColumns);
        
        $laraModelFactoryStub = $this->files->get($this->getLaraModelFactoryStub());
        $laraModelFactoryStub = str_replace('DummyLaraModel', "\LaraModels\\".$this->getLaraModel().'::class', $laraModelFactoryStub);
        $laraModelFactoryStub = str_replace('DummyFakerValues', $fakerValues, $laraModelFactoryStub);
        
        $modelFactoryStub = $this->files->get($this->getModelFactoryStub());
        $modelFactoryStub = str_replace('//DummyFactory', $laraModelFactoryStub."\n\t//DummyFactory", $modelFactoryStub);
        $this->files->put($this->getModelFactoryStub(), $modelFactoryStub);
    }

    public function writeSeeder(){
        $seederStub = $this->files->get($this->getSeederStub());
        $seederStub = str_replace('DummySeeder', $this->getSeederName(), $seederStub);
        $seederStub = str_replace('DummyLaraModel', "\LaraModels\\".$this->getLaraModel(), $seederStub);
        if(!file_exists(database_path('seeds/'.$this->getSeederName().'.php'))){
            $this->files->put(database_path('seeds/'.$this->getSeederName().'.php'), $seederStub);
        }
    }

    public function attachSeeder(){
        $databaseSeederStub = $this->files->get($this->getDatabaseSeederStub());
        $databaseSeederStub = str_replace('//DummySeeder', '$this->call('.$this->getSeederName().'::class);'."\n\t\t//DummySeeder", $databaseSeederStub);
        $this->files->put($this->getDatabaseSeederStub(), $databaseSeederStub);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->writeSeeder();
        
        $this->writeFactory();

        $this->attachSeeder();

        echo("Seeder created! \n");
    }

    public function modelExists($laraModel){
        $path = app_path('Db/LaraModels');
        $objects = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path), \RecursiveIteratorIterator::SELF_FIRST);
        foreach($objects as $name => $object){
            if(basename($name,'.php') == $laraModel)
                return true;
        }
        return false;
    }

    public function getLaraModelFactoryStub(){
        return app_path('Stubs/lara_model.factory.stub');
    }

    public function getModelFactoryStub(){
        return database_path('factories/ModelFactory.php');
    }

    public function getDatabaseSeederStub(){
        return database_path('seeds/DatabaseSeeder.php');
    }

    public function getSeederStub(){
        return app_path('Stubs/seeder.stub');
    }
}
