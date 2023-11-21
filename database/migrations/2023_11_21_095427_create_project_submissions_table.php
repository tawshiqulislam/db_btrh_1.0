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
        Schema::create('project_submissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_initiation_id');
            $table->unsignedBigInteger('project_submitted_by');
            $table->unsignedBigInteger('project_accepted_by');
            $table->longText('description')->nullable();
            $table->text('comment')->nullable();
            $table->string('file')->nullable();
            $table->text('link')->nullable();
            $table->string('status')->nullable();
            $table->boolean('isAccepted')->default(false)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_submissions');
    }
};
