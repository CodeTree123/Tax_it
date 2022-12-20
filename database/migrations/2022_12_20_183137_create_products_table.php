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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('hs_code');
            $table->string('description')->nullable();
            $table->integer('CD')->nullable();
            $table->string('SD')->nullable();
            $table->integer('VAT')->nullable();
            $table->integer('AIT')->nullable();
            $table->integer('RD')->nullable();
            $table->integer('ATV')->nullable();
            $table->double('TTI')->nullable();
            $table->string('sCD')->nullable();
            $table->string('sSD')->nullable();
            $table->string('sVAT')->nullable();
            $table->string('sAIT')->nullable();
            $table->string('sRD')->nullable();
            $table->string('sATV')->nullable();
            $table->string('sTTI')->nullable();
            $table->string('TARIFF')->nullable();
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
        Schema::dropIfExists('products');
    }
};
