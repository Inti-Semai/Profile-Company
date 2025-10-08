<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanySetting extends Model
{
    protected $fillable = [
        'company_name',
        'hero_image',
        'hero_title',
        'hero_subtitle',
        'vision_image',
        'vision_text',
        'mission_image',
        'mission_text',
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
