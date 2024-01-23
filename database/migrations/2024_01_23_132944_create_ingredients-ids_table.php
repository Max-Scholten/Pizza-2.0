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
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('ingredients_id')->nullable();
            $table->foreign('ingredients_id')->references('id')->on('ingredients');
        });

        Schema::table('menus', function (Blueprint $table) {
            $table->unsignedBigInteger('ingredients_id')->nullable();
            $table->foreign('ingredients_id')->references('id')->on('ingredients');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['ingredients_id']);
            $table->dropColumn('ingredients_id');
        });

        Schema::table('menus', function (Blueprint $table) {
            $table->dropForeign(['ingredients_id']);
            $table->dropColumn('ingredients_id');
        });
    }
};
