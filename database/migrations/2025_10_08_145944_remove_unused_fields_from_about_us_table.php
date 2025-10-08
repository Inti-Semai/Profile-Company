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
        Schema::table('about_us', function (Blueprint $table) {
            $table->dropColumn(['main_title', 'vision_text', 'mission_text']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->string('main_title')->default('KENALI KAMI LEBIH DEKAT')->after('hero_text');
            $table->text('vision_text')->nullable()->after('intro_text');
            $table->text('mission_text')->nullable()->after('vision_text');
        });
    }
};
