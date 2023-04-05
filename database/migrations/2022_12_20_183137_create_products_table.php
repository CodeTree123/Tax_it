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
            $table->integer('HSCODE');
            $table->string('DESCRIPTION');
            $table->string('h2')->nullable();
            $table->integer('SU')->nullable();
            $table->integer('CD')->nullable();
            $table->integer('RD')->nullable();
            $table->string('SD')->nullable();
            $table->integer('VAT')->nullable();
            $table->integer('AT')->nullable();
            $table->integer('AIT')->nullable();
            $table->double('TTI')->nullable();
            $table->double('SRO-Ref')->nullable();
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
