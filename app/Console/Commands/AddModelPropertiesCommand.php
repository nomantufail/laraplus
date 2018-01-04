<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Libs\Helper;

class AddModelPropertiesCommand extends Command
{
    protected $files = null;
    private $modelName = '';
    private $props = [];
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'addProps:model {name?} {props?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add properties in laravel model && associated emrevo model';

    /**
     * Create a new command instance.
     * @param Filesystem $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
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
        $props = ', ';
        foreach ($this->getProps() as $key => $pwt) {
            $prop_n_type = explode(':', $pwt);
            $props .= '\''.$prop_n_type[0].'\'';
            if($key+1 < sizeof($this->getProps())){
                $props .= ', ';
            }
        }
        return $props.'/*DummyFillables*/';
    }

    public function fire()
    {
        $this->modelName = ucfirst(($this->argument('name'))?$this->argument('name'):$this->ask('please enter model name'));
        $this->props = ($this->argument('props'))?explode(' ', $this->argument('props')):explode(' ', $this->ask('please enter model properties. e.g(id:int name:string)'));

        $stub = $this->files->get($this->getStub());
        $stub = str_replace('/*DummyFillables*/', $this->getFillables(), $stub);
        $this->files->put($this->getStub(), $stub);
        echo "Properties created in laravel model. \n !!!NOTE:- Make sure you add these properties in the seeder. Thank You! \n";

        $this->addEmModelProperty();
    }


    public function addEmModelProperty(){
        $this->call('addProps:emmodel', [
            'model' => $this->getModelName(),
            'props' => join(' ',$this->getProps())
        ]);
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return app_path('Db/LaraModels/'.$this->getModelName().'.php');
    }
}
