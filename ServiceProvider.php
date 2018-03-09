<?php namespace Isswp101\PageSettings;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $configPath = __DIR__ . '/config/page.php';
        $this->publishes([$configPath => config_path('page.php')], 'config');
    }
}