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
        //
        Schema::table('orders',function (Blueprint $table){
            $table->unsignedBigInteger('grote_id')->nullable();

            $table->foreign('grote_id')->references('id')->on('maats');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['grote_id']);
            $table->dropColumn('grote_id');
        });
    }
};
