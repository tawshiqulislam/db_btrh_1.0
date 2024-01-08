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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->text('company_address');
            $table->string('company_email_address');
            $table->string('company_key_contact_person_name');
            $table->string('designation_of_key_contact_person');
            $table->string('key_contact_person_email_address');
            $table->string('trade_license_no')->nullable();
            $table->string('vat_bin_no')->nullable();
            $table->string('tin_no')->nullable();
            $table->string('documents')->nullable();
            $table->string('user_type')->default('vendor');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
