<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upzillas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->foreign('distict_id')->references('id')->on('disticts')->onDelete('cascade');
            $table->foreignId('distict_id')->constrained('disticts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upzillas');
    }
};
