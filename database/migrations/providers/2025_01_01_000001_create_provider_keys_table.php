<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration to create the 'provider_keys' table.
 *
 * Table columns:
 * - id (UUID): Primary key.
 * - provider_id (UUID): Foreign key referencing the 'providers' table's 'id' column.
 * - key_name (string, 100): The name of the key (up to 100 characters).
 * - key_value (text): The value associated with the key.
 * - timestamps: Laravel's created_at and updated_at columns.
 *
 * Indexes:
 * - Unique constraint on ['provider_id', 'key_name'] to prevent duplicate key names per provider ("provider_keys_unique").
 */
return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('provider_keys', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Unique identifier for the key record
            $table->foreignUuid('provider_id')->constrained('providers'); // Foreign key to providers table
            $table->string('key_name', 100); // Name of the key
            $table->text('key_value'); // Value for the key
            $table->timestamps(); // created_at and updated_at columns

            // Ensure unique key name per provider
            $table->unique(['provider_id', 'key_name'], 'provider_keys_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('provider_keys');
    }
};
