<?php

use Illuminate\Support\Facades\Schema;
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
        Schema::table('ibuilder__layout_blocks', function (Blueprint $table) {
          $table->text('system_name')->after('block_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ibuilder__layout_blocks', function (Blueprint $table) {
          $table->dropColumn('system_name');
        });
    }
};
