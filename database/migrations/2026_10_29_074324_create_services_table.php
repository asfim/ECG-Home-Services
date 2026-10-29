<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('tag_text')->nullable();
            $table->string('tag_class')->nullable();
            $table->string('tag_icon')->nullable();
            $table->string('icon')->default('bi-heart-pulse');
            $table->string('icon_class')->nullable();
            $table->string('image');
            $table->text('description');
            $table->string('booking_service_name')->nullable();
            $table->string('action_link')->default('#booking');
            $table->string('action_text')->default('Book now');
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
