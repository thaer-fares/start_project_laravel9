<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testaments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('batch_id');
            $table->string('testament_number');
            $table->unsignedBigInteger('item_id');
            $table->string('item_quantity');
            $table->unsignedBigInteger('unit_id');
            $table->enum('testament_status', ['دائمة', 'مؤقتة']);
            $table->text('description')->nullable();
            $table->string('return_testament_date')->nullable();
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
        Schema::dropIfExists('testaments');
    }
};
