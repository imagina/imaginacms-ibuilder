<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumnsInBlockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

      Schema::table('ibuilder__blocks', function (Blueprint $table) {
        $table->text('grid_position')->nullable()->after('system_name');
        $table->integer('sort_order')->unsigned()->nullable()->after('system_name');
        $table->integer('layout_id')->unsigned()->nullable()->after('system_name');
        $table->foreign('layout_id')->references('id')->on('ibuilder__layouts')->onDelete('cascade');
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
        $table->dropForeign(['layout_id']);
        $table->dropColumn('layout_id');
        $table->dropColumn('grid_position');
        $table->dropColumn('sort_order');
      });
    }
}
