<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();  // e.g., "products", "orders", "reports"
            $table->string('description')->nullable(); // optional description
            $table->timestamps();
        });

        // Pivot table for many-to-many relationship between users and modules
        Schema::create('module_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('module_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['module_id', 'user_id']);  // prevent duplicates
        });
    }

    public function down()
    {
        Schema::dropIfExists('module_user');
        Schema::dropIfExists('modules');
    }
};
