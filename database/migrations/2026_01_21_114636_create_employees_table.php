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
        Schema::create('employees', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('employee_number', 20)->unique()->index();
            $table->string('first_name', 100)->index();
            $table->string('last_name', 100)->index();
            $table->string('email', 255)->unique()->index();
            $table->string('phone_number', 20)->nullable();
            $table->foreignId('department_id')->constrained();
            $table->foreignId('position_id')->constrained();
            $table->uuid('manager_id')->nullable();
            $table->enum('status', ["active","inactive","on_leave","terminated","suspended"])->default('active')->index();
            $table->date('hire_date');
            $table->date('termination_date')->nullable();
            $table->foreignId('access_level_id')->constrained();
            $table->string('badge_id', 50)->unique()->nullable();
            $table->string('created_by', 100);
            $table->string('updated_by', 100);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
