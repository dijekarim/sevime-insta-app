<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use MongoDB\Laravel\Schema\Blueprint;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create the `followers` collection
        Schema::connection('mongodb')->table('followers', function ($collection) {
            $collection->id();
            $collection->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $collection->foreignId('follower_id')->constrained('users')->onDelete('cascade');
            $collection->timestamps(); // Timestamp of the follow

            // Add indexes
            $collection->index('user_id');
            $collection->index('follower_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('followers');
    }
};
