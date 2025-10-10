<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanySetting extends Model
{
    protected $fillable = [
        'company_name',
        'hero_image',
        'hero_title',
        'hero_title_en',
        'hero_subtitle',
        'hero_subtitle_en',
        'hero_subtitle_top',
        'hero_subtitle_bottom',
        'vision_image',
        'vision_section',
        'vision_section_en',
        'vision_text',
        'vision_text_en',
        'mission_image',
        'mission_section',
        'mission_section_en',
        'mission_text',
        'mission_text_en',
        'address',
        'phone',
        'email',
        'maps_embed_url',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'youtube_url',
        'telegram_url',
        'tiktok_url',
        'whatsapp_number',
        'whatsapp_enabled',
    ];

    public function getHeroImageUrlAttribute()
    {
        return $this->hero_image ? asset('storage/' . $this->hero_image) : null;
    }

    public function getVisionImageUrlAttribute()
    {
        return $this->vision_image ? asset('storage/' . $this->vision_image) : null;
    }

    public function getMissionImageUrlAttribute()
    {
        return $this->mission_image ? asset('storage/' . $this->mission_image) : null;
    }
}
