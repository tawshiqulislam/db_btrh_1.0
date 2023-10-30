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
        Schema::create('project_initiation_overviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_initiation_id');
            $table->unsignedBigInteger('user_id');
            $table->string('designation')->nullable();
            $table->text('comment')->nullable();
            $table->unsignedBigInteger('assigned_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_initiation_overviews');
    }
};
