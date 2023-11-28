<?php

namespace Modules\Ibuilder\Providers;

use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Ibuilder\Listeners\RegisterIbuilderSidebar;
use Illuminate\Support\Facades\Blade;

class IbuilderServiceProvider extends ServiceProvider
{
  use CanPublishConfiguration;

  /**
   * Indicates if loading of the provider is deferred.
   *
   * @var bool
   */
  protected $defer = false;

  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
    $this->registerBindings();
    $this->app['events']->listen(BuildingSidebar::class, RegisterIbuilderSidebar::class);

    $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
      // append translations
    });


  }

  public function boot()
  {

    $this->publishConfig('ibuilder', 'config');
    $this->publishConfig('ibuilder', 'crud-fields');

    $this->mergeConfigFrom($this->getModuleConfigFilePath('ibuilder', 'settings'), "asgard.ibuilder.settings");
    $this->mergeConfigFrom($this->getModuleConfigFilePath('ibuilder', 'settings-fields'), "asgard.ibuilder.settings-fields");
    $this->mergeConfigFrom($this->getModuleConfigFilePath('ibuilder', 'permissions'), "asgard.ibuilder.permissions");
    $this->mergeConfigFrom($this->getModuleConfigFilePath('ibuilder', 'cmsPages'), "asgard.ibuilder.cmsPages");
    $this->mergeConfigFrom($this->getModuleConfigFilePath('ibuilder', 'cmsSidebar'), "asgard.ibuilder.cmsSidebar");
    $this->mergeConfigFrom($this->getModuleConfigFilePath('ibuilder', 'blocks'), "asgard.ibuilder.blocks");

    $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    $this->registerComponents();
  }

  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  public function provides()
  {
    return array();
  }

  private function registerBindings()
  {
    $this->app->bind(
      'Modules\Ibuilder\Repositories\BlockRepository',
      function () {
        $repository = new \Modules\Ibuilder\Repositories\Eloquent\EloquentBlockRepository(new \Modules\Ibuilder\Entities\Block());

        if (!config('app.cache')) {
          return $repository;
        }

        return new \Modules\Ibuilder\Repositories\Cache\CacheBlockDecorator($repository);
      }
    );
        $this->app->bind(
            'Modules\Ibuilder\Repositories\LayoutRepository',
            function () {
                $repository = new \Modules\Ibuilder\Repositories\Eloquent\EloquentLayoutRepository(new \Modules\Ibuilder\Entities\Layout());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Ibuilder\Repositories\Cache\CacheLayoutDecorator($repository);
            }
        );
// add bindings



  }

  /**
   * Register Blade components
   */
  private function registerComponents()
  {
    Blade::componentNamespace("Modules\Ibuilder\View\Components", 'ibuilder');
  }


}
