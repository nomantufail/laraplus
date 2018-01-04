<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Routing\Console\ControllerMakeCommand;
use Symfony\Component\Finder\Iterator\RecursiveDirectoryIterator;

class MakeControllerCommand extends ControllerMakeCommand
{
    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        if ($this->option('parent')) {
            return app_path('Stubs/controller.nested.stub');
        } elseif ($this->option('model')) {
            return app_path('Stubs/controller.model.stub');
        } elseif ($this->option('resource')) {
            return app_path('Stubs/controller.stub');
        }

        return app_path('Stubs/controller.plain.stub');
    }
}
