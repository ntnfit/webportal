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
        Schema::create('group_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('group_id');
            $table->unsignedInteger('user_id');
            $table->integer('role')->default(1);
            $table->unsignedInteger('added_by');
            $table->unsignedInteger('removed_by')->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->timestamps();

            $table->foreign('group_id')
                ->references('id')->on('groups')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');

            $table->foreign('removed_by')
                ->references('id')->on('users')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');

            $table->foreign('added_by')
                ->references('id')->on('users')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_users');
    }
};
