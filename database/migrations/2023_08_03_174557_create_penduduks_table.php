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
        Schema::create('penduduks', function (Blueprint $table) {
            $table->unsignedBigInteger('nik', 16);
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('pekerjaan')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('alamat', 100)->nullable();
            $table->string('agama')->nullable();
            $table->string('no_hp', 14)->unique()->nullable();
            $table->string('password');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduks');
    }
};
