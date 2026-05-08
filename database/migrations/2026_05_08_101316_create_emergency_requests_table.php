<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('emergency_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('requested_by')->constrained('users')->onDelete('cascade');
            $table->string('patient_name');
            $table->string('blood_group');
            $table->string('district');
            $table->string('hospital_name');
            $table->string('contact_number');
            $table->integer('units_needed')->default(1);
            $table->text('note')->nullable();
            $table->enum('status', ['pending', 'notified', 'fulfilled', 'cancelled'])->default('pending');
            $table->integer('donors_notified')->default(0);
            $table->json('notified_donor_ids')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('emergency_requests');
    }
};