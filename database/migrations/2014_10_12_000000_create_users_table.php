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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('phone_no')->unique();
            $table->string('TFA')->default(0); // 0 for no two-factor authentication, 1 for phone number, 2 for email
            $table->string('last_login')->nullable();
            $table->boolean('isVerified')->default(0);
            $table->string('address');
            $table->string('id_number'); // irth Certificate, NID, Passport (number)
            $table->string('id_type'); // Birth Certificate, NID, Passport
            $table->string('sq_no_1')->nullable(); // Security Question 1  // another table
            $table->string('sq_no_1_ans')->nullable(); // Ans 1 for SQ 1
            $table->string('sq_no_2')->nullable(); // Security Question 2  // another table
            $table->string('sq_no_2_ans')->nullable(); // Ans 2 for SQ 2
            $table->string('pro_pic')->nullable(); // profile picture
            $table->date('date_of_birth');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
