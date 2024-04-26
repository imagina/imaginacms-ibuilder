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
    Schema::create('ibuilder__layouts', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->increments('id');
      $table->string('system_name');
      $table->string('entity_type')->nullable();
      $table->string('type')->nullable();
      $table->boolean('default')->default(0);
      $table->boolean('status')->default(1);
      $table->unique(['system_name', 'entity_type']);
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
    Schema::dropIfExists('ibuilder__layouts');
  }
};