<?php namespace Icodemx\Projects\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('icodemx_projects_projects', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('reference')->nullable();
            $table->string('date')->nullable();
            $table->string('location')->nullable();
            $table->string('contribution')->nullable();
            $table->text('description')->nullable();
            $table->text('description_alt')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('icodemx_projects_projects');
    }
}
