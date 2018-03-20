<?php namespace Isswp101\PageSettings\Classes;

use Cms\Classes\Page;
use Isswp101\PageSettings\Models\PageSettings;

class PageSettingsFacade
{
    /**
     * @var string
     */
    protected $originalFileName;

    /**
     * Get settings from the database and merge them to a page.
     *
     * @param Page $page
     */
    public function fillPage(Page $page)
    {
        $key = $page->getFileName();
        $pageSettings = PageSettings::findByKey($key);
        if ($pageSettings) {
            $page->settings = array_merge($page->settings, $pageSettings->value);
        }
    }

    /**
     * Put settings to the database from a page.
     *
     * @param Page $page
     */
    public function save(Page $page)
    {
        $key = $page->getFileName();
        $pageAttributes = $this->getPageAttributes();
        $pageSettings = $this->findPageSettingsToPut($key) ?: $this->makePageSettings($key);

        $pageSettings->value = array_only($page->getSettingsAttribute(), $pageAttributes);
        $pageSettings->save();

        $page->setSettingsAttribute(array_fill_keys($pageAttributes, null));
        $page->save();
    }

    public function setOriginalFileName($fileName)
    {
        $this->originalFileName = $fileName;
    }

    protected function getPageAttributes()
    {
        return config('page.attributes', []);
    }

    protected function findPageSettingsToPut($key)
    {
        if ($this->originalFileName && $this->originalFileName != $key) {
            $pageSettings = PageSettings::findByKey($this->originalFileName);
            $pageSettings->key = $key;
            return $pageSettings;
        } else {
            return PageSettings::findByKey($key);
        }
    }

    protected function makePageSettings($key)
    {
        $pageSettings = new PageSettings();
        $pageSettings->key = $key;
        return $pageSettings;
    }
}