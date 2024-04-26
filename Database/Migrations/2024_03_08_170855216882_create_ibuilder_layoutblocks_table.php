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
    Schema::create('ibuilder__layout_blocks', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->increments('id');
      // Your fields...
      $table->integer('layout_id')->unsigned();
      $table->foreign('layout_id')->references('id')->on('ibuilder__layouts')->onDelete('cascade');
      $table->integer('block_id')->unsigned();
      $table->foreign('block_id')->references('id')->on('ibuilder__blocks')->onDelete('cascade');
      $table->integer('sort_order')->unsigned()->nullable();
      $table->string('parent_system_name')->nullable();
      $table->text('grid_position')->nullable();
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
    Schema::dropIfExists('ibuilder__layoutblocks');
  }
};
