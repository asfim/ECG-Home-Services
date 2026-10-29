<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_sections', function (Blueprint $table) {
            $table->id();
            $table->string('eyebrow')->default('Why CardioHome');
            $table->string('title');
            $table->string('title_highlight')->nullable();
            $table->text('lead_text')->nullable();
            $table->string('image')->default('images/doctor.jpg');
            $table->string('experience_years')->default('10+');
            $table->string('experience_text')->default("Years of cardiac\ncare experience");
            $table->json('features')->nullable();
            $table->integer('stat1_count')->default(25);
            $table->string('stat1_suffix')->default('+');
            $table->string('stat1_label')->default('Technicians');
            $table->integer('stat2_count')->default(12);
            $table->string('stat2_suffix')->nullable();
            $table->string('stat2_label')->default('Cardiologists');
            $table->integer('stat3_count')->default(24);
            $table->string('stat3_suffix')->default('/7');
            $table->string('stat3_label')->default('Support');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_sections');
    }
};
