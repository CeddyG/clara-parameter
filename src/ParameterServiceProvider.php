<?php
namespace CeddyG\ClaraParameter;

use Illuminate\Support\ServiceProvider;

use CeddyG\ClaraParameter\Repositories\ParameterRepository;
/**
 * Description of EntityServiceProvider
 *
 * @author CeddyG
 */
class ParameterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishesConfig();
		$this->publishesTranslations();
        $this->loadRoutesFrom(__DIR__.'/routes.php');
		$this->publishesView();
    }
    
    /**
	 * Publish config file.
	 * 
	 * @return void
	 */
	private function publishesConfig()
	{
		$sConfigPath = __DIR__ . '/../config';
        if (function_exists('config_path')) 
		{
            $sPublishPath = config_path();
        } 
		else 
		{
            $sPublishPath = base_path();
        }
		
        $this->publishes([$sConfigPath => $sPublishPath], 'clara.parameter.config');  
	}

	private function publishesTranslations()
	{
		$sTransPath = __DIR__.'/../resources/lang';

        $this->publishes([
			$sTransPath => resource_path('lang/vendor/clara-parameter'),
			'clara.parameter.trans'
		]);
        
		$this->loadTranslationsFrom($sTransPath, 'clara-parameter');
    }

	private function publishesView()
	{
        $sResources = __DIR__.'/../resources/views';

        $this->publishes([
            $sResources => resource_path('views/vendor/clara-parameter'),
        ], 'clara.parameter.views');
        
        $this->loadViewsFrom($sResources, 'clara-parameter');
	}

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/clara.parameter.php', 'clara.parameter'
        );
        
        $this->app->singleton('clara.parameter', function ($app) 
		{
            return new ParameterRepository();
        });
    }
}
