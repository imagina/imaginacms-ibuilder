<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddParentSystemNameColumnInBlockTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {

    Schema::table('ibuilder__blocks', function (Blueprint $table) {
      $table->string('parent_system_name')->nullable()->after('layout_id');
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
      $table->dropColumn('parent_system_name');
    });
  }
}
