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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();

            // Status
            $table->enum('status', ['belum_selesai', 'sedang_dikerjakan', 'selesai'])->default('belum_selesai');
            $table->enum('priority', ['rendah', 'sedang', 'tinggi'])->default('sedang');
            $table->dateTime('deadline')->nullable();

            // Tim
            $table->foreignId('team_id')->constrained('teams')->onDelete('cascade'); // Tugas milik tim mana
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade'); // Yang membuat/assign
            $table->foreignId('assigned_to')->nullable()->constrained('users')->onDelete('set null'); // Anggota yang mengerjakan

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
