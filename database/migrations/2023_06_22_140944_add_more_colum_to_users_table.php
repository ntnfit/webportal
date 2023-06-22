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
        Schema::table('users', function (Blueprint $table) {
            $table->string("phone")->nullable();
            $table->timestamp("last_seen")->nullable();
            $table->integer("is_online")->default(0)->nullable();
            $table->text("about")->nullable();
            $table->string("photo_url")->nullable();
            $table->string("activation_code")->nullable();
            $table->integer("is_system")->default(0)->nullable();
            $table->integer("permitter_id")->default(0)->nullable();
            $table->integer("site_id")->default(0)->nullable();
            $table->integer("department_id")->default(0)->nullable();
            $table->integer("is_permitter")->default(0)->nullable();
            $table->string("job_title")->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string("phone")->nullable();
            $table->timestamp("last_seen")->nullable();
            $table->integer("is_online")->default(0)->nullable();
            $table->text("about")->nullable();
            $table->string("photo_url")->nullable();
            $table->string("activation_code")->nullable();
            $table->integer("is_system")->default(0)->nullable();
            $table->integer("permitter_id")->default(0)->nullable();
            $table->integer("site_id")->default(0)->nullable();
            $table->integer("department_id")->default(0)->nullable();
            $table->integer("is_permitter")->default(0)->nullable();
            $table->string("job_title")->default(0)->nullable();
        });
    }
};
