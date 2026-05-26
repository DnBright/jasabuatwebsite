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
        Schema::dropIfExists('calculator_features');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('calculator_features', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->integer('price')->default(0);
            $table->string('category')->default('feature'); // feature, service
            $table->integer('sort_order')->default(0);
            $table->boolean('is_recommended')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }
};
