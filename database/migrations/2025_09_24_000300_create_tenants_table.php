<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assigned_building_id')->nullable()->constrained('buildings')->nullOnDelete();
            $table->foreignId('house_owner_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('name');
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();

            $table->index(['house_owner_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};


