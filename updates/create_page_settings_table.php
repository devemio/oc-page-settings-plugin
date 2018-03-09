<?php namespace Isswp101\PageSettings\Updates;

use October\Rain\Database\Updates\Migration;
use Schema;

class CreatePageSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('isswp101_pagesettings_page_settings', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('isswp101_pagesettings_page_settings');
    }
}