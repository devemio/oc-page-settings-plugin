<?php namespace Isswp101\PageSettings\Models;

use Model;

/**
 * @property string key
 * @property string value
 */
class PageSettings extends Model
{
    public $table = 'isswp101_pagesettings_page_settings';

    protected $jsonable = ['value'];

    /**
     * Find model by key column.
     *
     * @param string $key
     * @return static|null
     */
    public static function findByKey($key)
    {
        return PageSettings::where('key', $key)->first();
    }
}
