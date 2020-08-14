<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('Name', 15);
        });
        Schema::create('status', function (Blueprint $table) {
            $table->id();
            $table->string('Name', 15);
        });
        Schema::create('priority', function (Blueprint $table) {
            $table->id();
            $table->string('Name', 15);
        });
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->string('Name',100);
            $table->integer('Type');
            $table->integer('Status')->default('1');
            $table->integer('Priority');
            $table->text('Desc', 1000);
            $table->integer('User');
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);
            $table->foreign('Type')->references('id')->on('types');
            $table->foreign('Status')->references('id')->on('status');
            $table->foreign('User')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('issues');
    }
}
