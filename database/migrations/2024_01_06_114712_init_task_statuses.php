<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('task_Statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            #$table->bigInteger('task_id')->unsigned();
            #$table->foreign('task_id')->references('id')->on('task');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taskStatuses');
    }
};
