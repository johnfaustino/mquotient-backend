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
        Schema::create('demo_requests', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('demo_type');
            $table->string('interaction_reason', 200);

            // Mortgage fields
            $table->string('mortgage_business_function')->nullable();
            $table->string('mortgage_los')->nullable();
            $table->string('mortgage_monthly_volume')->nullable();
            $table->string('mortgage_service')->nullable();

            // Insurance fields
            $table->string('insurance_company_type')->nullable();
            $table->string('insurance_business_role')->nullable();
            $table->string('insurance_employee_count')->nullable();
            $table->string('insurance_service')->nullable();

            $table->timestamps();
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demo_requests');
    }
};
