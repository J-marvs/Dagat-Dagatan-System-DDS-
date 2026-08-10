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
        Schema::create('pricing_rules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_types_id')->constrained('booking_types')->onDelete('cascade');
            $table->string('rule_name');
            $table->decimal('discount_percent', 5, 2);
            $table->integer('minimum_age');
            $table->integer('maximum_age');
            $table->boolean('requires_id')->default(false);
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricing_rules');
    }
};
