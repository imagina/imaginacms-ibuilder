<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('ibuilder__blocks', function (Blueprint $table) {
          $table->boolean('with_content_editable')->default(0)->after('attributes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ibuilder__blocks', function (Blueprint $table) {
          $table->dropColumn('with_content_editable');
        });
    }
};
