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
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_initiation_id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('resource_type');
            $table->integer('quantity')->nullable();
            $table->decimal('cost', 10, 2)->nullable();
            $table->string('document')->nullable();
            $table->date('date_added')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resources');
    }
};
