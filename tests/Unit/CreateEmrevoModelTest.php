<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Console\Commands\MakeEmModelCommand;
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
        $generatedClassName = MakeEmModelCommand::getClassName($classPath);
        $this->assertEquals($generatedClassName, "Foo");
    }


    public function test_getModelNamespace(){
        $generatedResponse = MakeEmModelCommand::getModelNameSpace('FeeStructure/Foo/Bar/Classe'); 
        $this->assertEquals($generatedResponse, 'namespace Models\FeeStructure\Foo\Bar'); 

        $generatedResponse = MakeEmModelCommand::getModelNameSpace('Classe'); 
        $this->assertEquals($generatedResponse, 'namespace Models');
    }
}
