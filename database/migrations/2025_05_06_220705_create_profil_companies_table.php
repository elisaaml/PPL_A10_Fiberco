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
        Schema::create('profil_company', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->text('address');
            $table->text('about1');
            $table->text('about2');
            // $table->string('struktur')->nullable();
            $table->string('banner1')->nullable();
            $table->string('banner2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_company');
    }
};
