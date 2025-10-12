<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'name_en',
        'specification',
    'image',
    'description',
    'description_en',
    'specification_en',
    'shopee_url',
    'tokopedia_url',
    'button_label',
    'button_label_en',
    'order',
    ];

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }
}
