<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration to create the 'providers' table.
 *
 * Table columns:
 * - id (UUID): Primary key.
 * - name (string, 150): Name of the provider (max 150 characters).
 * - slug (string, 255): Provider slug (max 255 characters).
 * - is_active (boolean): Indicates if the provider is active. Defaults to true.
 * - timestamps: Laravel's created_at and updated_at columns.
 *
 * Indexes:
 * - Composite index on slug and is_active ("idx_providers_slug_is_active").
 */
return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Unique identifier for the provider
            $table->string('name', 150); // Provider name
            $table->string('slug', 255); // Slug for the provider
            $table->boolean('is_active')->default(true); // Whether the provider is active
            $table->timestamps(); // created_at and updated_at

            // Index for optimizing queries filtering by slug and is_active
            $table->index(['slug', 'is_active'], 'idx_providers_slug_is_active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('providers');
    }
};
