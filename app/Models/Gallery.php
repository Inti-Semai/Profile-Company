<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'title',
        'image',
        'order',
        'product_id',
    ];

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    public function isVideo()
    {
        $videoExtensions = ['mp4', 'avi', 'mov', 'wmv'];
        $extension = strtolower(pathinfo($this->image, PATHINFO_EXTENSION));
        return in_array($extension, $videoExtensions);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
