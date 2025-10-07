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
            $table->text('maps_embed_url')->nullable()->after('email');
            $table->string('facebook_url')->nullable()->after('maps_embed_url');
            $table->string('twitter_url')->nullable()->after('facebook_url');
            $table->string('instagram_url')->nullable()->after('twitter_url');
            $table->string('youtube_url')->nullable()->after('instagram_url');
            $table->string('telegram_url')->nullable()->after('youtube_url');
            $table->string('tiktok_url')->nullable()->after('telegram_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('company_settings', function (Blueprint $table) {
            $table->dropColumn([
                'maps_embed_url',
                'facebook_url',
                'twitter_url',
                'instagram_url',
                'youtube_url',
                'telegram_url',
                'tiktok_url'
            ]);
        });
    }
};
