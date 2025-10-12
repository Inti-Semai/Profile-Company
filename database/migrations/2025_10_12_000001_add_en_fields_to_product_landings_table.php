<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('product_landings', function (Blueprint $table) {
            $table->string('hero_subtitle_top_en')->nullable()->after('hero_subtitle_top');
            $table->string('hero_subtitle_bottom_en')->nullable()->after('hero_subtitle_bottom');
        });
    }
    public function down(): void
    {
        Schema::table('product_landings', function (Blueprint $table) {
            $table->dropColumn(['hero_subtitle_top_en', 'hero_subtitle_bottom_en']);
        });
    }
};
