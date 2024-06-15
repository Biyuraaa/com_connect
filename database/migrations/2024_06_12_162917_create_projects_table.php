<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->date('date')->nullable(false);
            $table->string('location')->nullable(false);
            $table->unsignedBigInteger('organizer_id')->nullable(false);
            $table->foreign('organizer_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('status', ['completed', 'progress'])->nullable(false)->default('progress');
            $table->unsignedBigInteger('category_id')->nullable(false);
            $table->foreign('category_id')->references('id')->on('category_projects')->onDelete('cascade');
            $table->integer('capacity')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
