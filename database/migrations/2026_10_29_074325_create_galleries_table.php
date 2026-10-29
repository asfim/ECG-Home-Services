<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('designation')->nullable();
            $table->string('badge_text')->nullable();
            $table->string('badge_class')->nullable();
            $table->string('badge_icon')->nullable();
            $table->string('image');
            $table->text('description')->nullable();
            $table->json('tags')->nullable();
            $table->json('features')->nullable();
            $table->string('btn1_text')->nullable();
            $table->string('btn1_link')->nullable();
            $table->string('btn1_icon')->nullable();
            $table->string('btn1_class')->nullable();
            $table->string('btn2_text')->nullable();
            $table->string('btn2_link')->nullable();
            $table->string('btn2_icon')->nullable();
            $table->string('btn2_class')->nullable();
            $table->string('booking_service')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
