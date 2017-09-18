<?php namespace Icodemx\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::table('icodemx_projects_projects', function($table) {
            $table->integer('typecover')->nullable();
        });
    }

    public function down()
    {

    }
}
