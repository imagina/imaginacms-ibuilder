<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ibuilder__buildables', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your fields...
            $table->integer('layout_id')->unsigned()->nullable();
            $table->string('entity_type');
            $table->integer('entity_id')->unsigned();
            $table->string('type')->nullable();
            $table->unique(['entity_type', 'entity_id']);
            $table->foreign('layout_id')->references('id')->on('ibuilder__layouts')->onDelete('cascade');
            // Audit fields
            $table->timestamps();
            $table->auditStamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ibuilder__buildables');
    }
};
