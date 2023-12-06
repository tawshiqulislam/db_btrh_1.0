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
        Schema::create('disburse_project_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_initiation_id');
            $table->unsignedBigInteger('project_submission_id');
            $table->longText('description')->nullable();
            $table->string('payment_status')->default('pending');
            $table->boolean('isDisbursed')->default(false);
            $table->unsignedBigInteger('send_by')->nullable();
            $table->unsignedBigInteger('disbursed_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disburse_project_payments');
    }
};
