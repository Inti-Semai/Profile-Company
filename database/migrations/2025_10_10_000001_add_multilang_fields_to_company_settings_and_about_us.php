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
        Schema::table('company_settings', function (Blueprint $table) {
            // Hero Title & Subtitle
            $table->string('hero_title_en')->nullable()->after('hero_title');
            $table->text('hero_subtitle_en')->nullable()->after('hero_subtitle');
            // Vision Section
            $table->string('vision_section')->nullable()->after('vision_image');
            $table->string('vision_section_en')->nullable()->after('vision_section');
            $table->text('vision_text_en')->nullable()->after('vision_text');
            // Mission Section
            $table->string('mission_section')->nullable()->after('mission_image');
            $table->string('mission_section_en')->nullable()->after('mission_section');
            $table->text('mission_text_en')->nullable()->after('mission_text');
        });

        Schema::table('about_us', function (Blueprint $table) {
            // Hero Title Text
            $table->string('hero_title_text_en')->nullable()->after('hero_text');
            // Main Title
            $table->string('main_title_en')->nullable()->after('main_title');
            // Introduction Text
            $table->text('intro_text_en')->nullable()->after('intro_text');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('company_settings', function (Blueprint $table) {
            $table->dropColumn([
                'hero_title_en',
                'hero_subtitle_en',
                'vision_section',
                'vision_section_en',
                'vision_text_en',
                'mission_section',
                'mission_section_en',
                'mission_text_en',
            ]);
        });
        Schema::table('about_us', function (Blueprint $table) {
            $table->dropColumn([
                'hero_title_text_en',
                'main_title_en',
                'intro_text_en',
            ]);
        });
    }
};
