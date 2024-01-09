<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();

            $table->bigInteger('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('task_statuses');

            $table->bigInteger('author_id')->unsigned();
            $table->foreign('author_id')->references('id')->on('users');

            $table->bigInteger('executor_id')->unsigned()->nullable();
            $table->foreign('executor_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
