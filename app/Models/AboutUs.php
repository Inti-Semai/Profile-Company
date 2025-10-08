<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $table = 'about_us';

    protected $fillable = [
        'hero_text',
        'main_title',
        'intro_text',
        'image_1',
        'image_2',
        'image_3',
        'image_4',
    ];

    public function getImage1UrlAttribute()
    {
        return $this->image_1 ? asset('storage/' . $this->image_1) : null;
    }

    public function getImage2UrlAttribute()
    {
        return $this->image_2 ? asset('storage/' . $this->image_2) : null;
    }

    public function getImage3UrlAttribute()
    {
        return $this->image_3 ? asset('storage/' . $this->image_3) : null;
    }

    public function getImage4UrlAttribute()
    {
        return $this->image_4 ? asset('storage/' . $this->image_4) : null;
    }
}
