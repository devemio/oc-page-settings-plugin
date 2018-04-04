# Page Settings

Plugin allows you to store page metadata in the database instead of files.

This plugin can be useful if you want to store page metadata in the database.
For example, when you store your source code in Git and some admins have access to edit page metadata.
When you upload a new version to production it can be difficult to merge changes.

## Installation

```
php artisan plugin:install Isswp101.PageSettings
```

## Usage

To active this feature for existing pages you need to open pages and click on the "**Save**" button for each required page.
By default the plugin stores the fields described below but you can extend this with a configuration file.
After the page is saved the fields will be stored to the database and removed from the file.

##### Settings

* Description
* Hidden

##### Meta

* Meta Title
* Meta Description

## Configuration

File-based configuration http://octobercms.com/docs/plugin/settings#file-configuration  
This plugin has a configuration file `config.php` in the `config` subdirectory of the plugin directory.  
A plugin configuration can be overridden by the application by creating a configuration file:

```
mkdir -p config/isswp101/pagesettings
cp plugins/isswp101/pagesettings/config/config.php config/isswp101/pagesettings
```

The configuration file will be located here `config/isswp101/pagesettings/config.php`

If you extend the page using https://octobercms.com/docs/plugin/extending#extending-backend-form
you can specify your fields in the configuration as well.

```
'attributes' => [
    'description',
    'is_hidden',
    'meta_title',
    'meta_description',

    'custom_page_field' // added field
]
```