<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('group_id');
            $table->string('request_type')->default('get');
            $table->string('url');
            $table->string('controller');
            $table->string('action');
            $table->string('title');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('guard_name')->default('admin');
            $table->string('icon');
            $table->bigInteger('parent_id');
            $table->integer('sort')->default(1);
            $table->tinyInteger('show_in_menu')->default(1);
            $table->tinyInteger('has_link')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
