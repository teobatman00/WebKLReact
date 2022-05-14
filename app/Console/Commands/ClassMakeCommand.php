<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;
use InvalidArgumentException;
use Symfony\Component\Console\Input\InputArgument;

class ClassMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:class {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new custom class';

    protected $type = 'Class';

    protected function getStub()
    {
        return app_path('Console/Stubs/Class.stub');
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace;
    }

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of class']
        ];
    }
}
