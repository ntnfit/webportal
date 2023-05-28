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
        Schema::create('purchasing_detail', function (Blueprint $table) {
            $table->id();
            $table->string('purchasingID');
            $table->foreign('purchasingID')->references('id')->on('purchasing');
            $table->bigInteger('itemID');
            $table->foreign('itemID')->references('id')->on('items');
            $table->integer('quantity');
            $table->bigInteger('unit_price');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('purchasing_detail');
    }
};
