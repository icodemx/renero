<?php namespace Icodemx\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class UpdateProjectsTable extends Migration
{
    public function up()
    {
        Schema::table('icodemx_projects_projects', function($table) {
            $table->integer('order')->nullable();
        });
    }

    public function down()
    {

    }
}
