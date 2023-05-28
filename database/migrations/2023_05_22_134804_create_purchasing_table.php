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
        Schema::create('purchasing', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->bigInteger('userID');
            $table->foreign('userID')->references('id')->on('users');
            $table->string('name')->nullable(false);
            $table->string('email')->nullable(false);
            $table->string('purchasing_detail_id')->nullable(false);
            $table->integer('quantity')->nullable(false);
            $table->float('total')->nullable(false);
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
        Schema::dropIfExists('purchasing');
    }
};
