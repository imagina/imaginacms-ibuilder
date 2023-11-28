<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class createIbuilderBlockLayoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ibuilder__block_layout', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('layout_id')->unsigned();
            $table->foreign('layout_id','layout_hist_id_foreign')->references('id')->on('ibuilder__layouts')->onDelete('restrict');

            $table->integer('block_id')->unsigned();
            $table->foreign('block_id','block_hist_id_foreign')->references('id')->on('ibuilder__blocks')->onDelete('restrict');

            $table->text('grid_position');
            $table->integer('order')->unsigned();
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
}
