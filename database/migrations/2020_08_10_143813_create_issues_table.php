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
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->string('Name',100);
            $table->unsignedBigInteger('types_id');
            $table->unsignedBigInteger('status_id')->default('1');
            $table->unsignedBigInteger('priority_id');
            $table->text('Desc', 1000);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);
            $table->foreign('types_id')->references('types.id')->on('types');
            $table->foreign('status_id')->references('statuses.id')->on('statuses');
            $table->foreign('priority_id')->references('priorities.id')->on('priorities');
            $table->foreign('user_id')->references('user_id')->on('users');
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
