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
        Schema::create('employee_access_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('employee_id')->constrained();
            $table->foreignId('access_group_id')->constrained();
            $table->timestamp('granted_at')->useCurrent();
            $table->foreignUuid('granted_by')->constrained('employees');
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_access_groups');
    }
};
