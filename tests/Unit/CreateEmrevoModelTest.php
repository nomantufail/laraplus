<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Console\Commands\MakeAppModelCommand;
use Models\FeeStructure\Section;

class FetchClassNameFromPathTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_getClassName()
    {
        $classPath = 'Foo';
        $generatedClassName = MakeAppModelCommand::getClassName($classPath);
        $this->assertEquals($generatedClassName, "Foo");
    }


    public function test_getModelNamespace(){
        $generatedResponse = MakeAppModelCommand::getModelNameSpace('FeeStructure/Foo/Bar/Classe'); 
        $this->assertEquals($generatedResponse, 'namespace Models\FeeStructure\Foo\Bar'); 

        $generatedResponse = MakeAppModelCommand::getModelNameSpace('Classe'); 
        $this->assertEquals($generatedResponse, 'namespace Models');
    }
}
