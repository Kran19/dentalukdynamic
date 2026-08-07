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
        Schema::create('referrals', function (Blueprint $table) {
            $table->id();
            
            // Referring Dentist Details
            $table->string('dentist_title');
            $table->string('dentist_first_name');
            $table->string('dentist_last_name');
            $table->string('dentist_email');
            $table->string('dentist_phone');
            
            // Practice Details
            $table->string('practice_name');
            $table->string('practice_postcode');
            $table->string('practice_address');
            $table->string('practice_phone');
            $table->string('practice_email');
            
            // Patient Details
            $table->string('patient_title');
            $table->string('patient_first_name');
            $table->string('patient_last_name');
            $table->date('patient_dob');
            $table->string('patient_gender');
            $table->string('patient_address');
            $table->string('patient_postcode');
            $table->string('patient_phone');
            $table->string('patient_email');
            $table->text('patient_medical_history');
            
            // Treatment & Referral Details
            $table->json('treatments_required');
            $table->string('referral_type'); // Routine, Urgent
            $table->text('reason_for_referral');
            
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referrals');
    }
};
