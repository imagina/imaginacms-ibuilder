<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIbuilderBuildableTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ibuilder__buildable_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('buildable_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['buildable_id', 'locale']);
            $table->foreign('buildable_id')->references('id')->on('ibuilder__buildables')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ibuilder__buildable_translations', function (Blueprint $table) {
            $table->dropForeign(['buildable_id']);
        });
        Schema::dropIfExists('ibuilder__buildable_translations');
    }
}
