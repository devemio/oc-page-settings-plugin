# Page Settings

Plugin allows you to store page metadata in the database instead of files.

This plugin can be useful if you want to store page metadata in the database.
For example, when you store your source code in Git and some admins have access to edit page metadata.
When you upload a new version to production it can be difficult to merge changes.

### Installation

```
git clone git@github.com:isswp101/oc-page-settings-plugin.git plugins/isswp101/pagesettings
rm -rf plugins/isswp101/pagesettings/.git
php artisan october:up
```

# Usage

To active this feature for existing pages you need to open pages and click on the "**Save**" button for each required page.
By default the plugin stores the fields described below but you can extend this with a configuration file.
After the page is saved the fields will be stored to the database and removed from the file.

##### Settings

* Description
* Hidden

##### Meta

* Meta Title
* Meta Description

# Configuration

You can specify fields to be stored in the database in the `config/page.php` file.
To publish the configuration file run the following command:

```
php artisan vendor:publish --provider="Isswp101\PageSettings\ServiceProvider"
```

If you extend the page using https://octobercms.com/docs/plugin/extending#extending-backend-form
you can specify your fields in the configuration as well.