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
        Schema::create('dogs', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('name');
            $table->integer('age_months');
            $table->string('race');
            $table->string('size');
            $table->string('hair_color');
            $table->string('hair_style');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
  public function down()
{
    Schema::dropIfExists('dogs');
    }
};