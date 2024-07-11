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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->decimal('price', 28,2);
            $table->string('condition');
            $table->string('category');
            $table->string('brand');
            $table->string('model');
            $table->string('type');
            $table->string('color');
            $table->string('storage');
            $table->string('memory');
            $table->string('operating_system');
            $table->string('signal_status');
            $table->string('image');
            $table->string('release_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
