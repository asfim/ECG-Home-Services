<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_highlight')->nullable();
            $table->text('subtitle')->nullable();
            $table->string('badge_text')->nullable();
            $table->string('badge_icon')->nullable();
            $table->string('image');
            $table->string('btn1_text')->nullable();
            $table->string('btn1_link')->nullable();
            $table->string('btn1_icon')->nullable();
            $table->string('btn2_text')->nullable();
            $table->string('btn2_link')->nullable();
            $table->string('btn2_icon')->nullable();
            $table->string('float_card_1_title')->nullable();
            $table->string('float_card_1_subtitle')->nullable();
            $table->string('float_card_1_icon')->nullable();
            $table->string('float_card_2_title')->nullable();
            $table->string('float_card_2_subtitle')->nullable();
            $table->string('float_card_2_icon')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
