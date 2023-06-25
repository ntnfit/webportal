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
        Schema::create('last_conversations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('group_id');
            $table->unsignedInteger('conversation_id');
            $table->unsignedInteger('user_id');
            $table->text('group_details');

            $table->index('group_id');

            $table->foreign('group_id')
                ->references('id')->on('groups')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');

            $table->foreign('conversation_id')
                ->references('id')->on('conversations')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
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
        Schema::dropIfExists('last_conversations');
    }
};
