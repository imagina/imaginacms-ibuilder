<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIbuilderLayoutableTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('ibuilder__layoutable', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->increments('id');
      $table->integer('layout_id')->unsigned();
      $table->string('entity_type')->nullable();
      $table->integer('entity_id')->unsigned()->nullable();
      $table->unique(['layout_id', 'entity_type', 'entity_id']);
      $table->foreign('layout_id')->references('id')->on('ibuilder__layouts')->onDelete('cascade');
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
    Schema::dropIfExists('ibuilder__layoutable');
  }
}
