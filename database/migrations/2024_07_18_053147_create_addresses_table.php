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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('type')->nullable(); // home, office, etc.
            $table->string('recipient_name'); // Nama penerima
            $table->string('phone_number'); // Nomor telepon penerima
            $table->string('address_line1'); // Alamat utama
            $table->string('address_line2')->nullable(); // Alamat tambahan
            $table->string('district'); // Kecamatan
            $table->string('city'); // Kota/Kabupaten
            $table->string('state'); // Provinsi
            $table->string('postal_code'); // Kode pos
            $table->softDeletes();            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
