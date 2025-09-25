<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flat_id')->constrained('flats')->cascadeOnDelete();
            $table->foreignId('bill_category_id')->constrained('bill_categories')->cascadeOnDelete();
            $table->foreignId('house_owner_id')->constrained('users')->cascadeOnDelete();
            $table->string('month'); // e.g., 2025-09
            $table->decimal('amount', 12, 2);
            $table->enum('status', ['paid', 'unpaid'])->default('unpaid');
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index(['house_owner_id']);
            $table->unique(['flat_id', 'bill_category_id', 'month']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};


