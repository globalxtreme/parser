<?php

namespace GlobalXtreme\Parser;

use Illuminate\Support\ServiceProvider;

class ParserServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {

            $this->commands([
                Console\GlobalXtremeParserMakeCommand::class
            ]);

        }
    }

    public function register()
    {
        //
    }
}
