<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddParentIdColumnInBlockTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {

    Schema::table('ibuilder__blocks', function (Blueprint $table) {
      $table->integer('parent_id')->nullable()->default(0)->after('layout_id');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('ibuilder__blocks', function (Blueprint $table) {
      $table->dropColumn('parent_id');
    });
  }
}
