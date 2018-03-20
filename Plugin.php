<?php namespace Isswp101\PageSettings;

use Cms\Classes\Page;
use Illuminate\Support\Facades\Event;
use Isswp101\PageSettings\Classes\PageSettingsFacade;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name' => 'Page Settings',
            'description' => 'Plugin allows you to store page settings in the database.',
            'author' => 'Isswp101',
        ];
    }

    public function boot()
    {
        $this->app->register(ServiceProvider::class);

        $this->registerPageEvents();
    }

    protected function registerPageEvents()
    {
        $pageSettings = new PageSettingsFacade();

        // Frontend
        Event::listen('cms.page.beforeRenderPage', function ($c, $page) use ($pageSettings) {
            $pageSettings->fillPage($page);
        });

        // Backend
        Event::listen('cms.template.processSettingsAfterLoad', function ($c, $template) use ($pageSettings) {
            if ($template instanceof Page) {
                $pageSettings->fillPage($template);
            }
        });

        // Backend
        Event::listen('cms.template.save', function ($c, $template) use ($pageSettings) {
            if ($template instanceof Page) {
                $pageSettings->save($template);
            }
        });

        Event::listen('cms.template.processSettingsAfterLoad', function ($c, $template) use ($pageSettings) {
            if ($template instanceof Page) {
                $pageSettings->setOriginalFileName($template->getFileName());
            }
        });
    }
}
