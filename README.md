# Page Settings

Plugin allows you to store page settings in the database.

### Installation

```
git clone git@github.com:isswp101/oc-page-settings-plugin.git plugins/isswp101/pagesettings
rm -rf plugins/isswp101/pagesettings/.git
php artisan october:up
```

Publish configuration:

```
php artisan vendor:publish --provider="Isswp101\PageSettings\ServiceProvider"
```

### Configuration

You can specify fields to be stored in the database in the `config/page.php`.