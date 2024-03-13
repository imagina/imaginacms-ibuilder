<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIbuilderLayoutTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ibuilder__layout_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields
            $table->string('title');
            $table->integer('layout_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['layout_id', 'locale']);
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
        Schema::table('ibuilder__layout_translations', function (Blueprint $table) {
            $table->dropForeign(['layout_id']);
        });
        Schema::dropIfExists('ibuilder__layout_translations');
    }
}
