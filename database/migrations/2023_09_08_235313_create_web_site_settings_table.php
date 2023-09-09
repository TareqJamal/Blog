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
        Schema::create('web_site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('about_url');
            $table->string('advertise_url');
            $table->string('careers_url');
            $table->string('subscribe_url');
            $table->string('facebok_url');
            $table->string('tweeter_url');
            $table->string('instgram_url');
            $table->string('mail_url');
            $table->string('copyright');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_site_settings');
    }
};
