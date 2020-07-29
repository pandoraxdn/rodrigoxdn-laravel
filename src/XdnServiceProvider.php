<?php

namespace RodrigoXdn\Laravel;

use Illuminate\Support\ServiceProvider;

use Illuminate\Foundation\AliasLoader;

use Illuminate\Contracts\Http\Kernel;

use Illuminate\Routing\Router;

use RodrigoXdn\Laravel\Http\Middleware\Hash;

use RodrigoXdn\Laravel\Console\InstallPkg;

use RodrigoXdn\Laravel\Console\WriteRoutes;

use RodrigoXdn\Laravel\Console\WriteExample;

use RodrigoXdn\Laravel\Console\MakeController;

use RodrigoXdn\Laravel\Console\MakeControllerAjax;

class XdnServiceProvider extends ServiceProvider
{
	public function boot()
	{
		$this->app['router']->aliasMiddleware('hash' , Hash::class);

		if ($this->app->runningInConsole()) {

    		$this->commands([
        		InstallPkg::class,
        		WriteRoutes::class,
        		WriteExample::class,
        		MakeController::class,
        		MakeControllerAjax::class,
    		]);
  		}
	}

	public function register()
	{
		$loader = AliasLoader::getInstance();

		$loader->alias('FunctionPkg','RodrigoXdn\Laravel\Fecades\FunctionPkg');

		$this->app->bind('FunctionPkg', function()
		{
			return new FunctionPkg;
			
		});	
	}

}