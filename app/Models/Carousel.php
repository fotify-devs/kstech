<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Carousel extends Model
{
    protected $fillable = [
        'image_path',
        'heading',
        'subheading',
        'button_text',
        'button_link',
        'order',
        'is_active'
    ];


    protected $casts = [
        'is_active' => 'boolean'
    ];


    public function getImageUrlAttribute()
    {
        return $this->image_path 
            ? Storage::url($this->image_path) 
            : null;
    }


    public function scopeActive($query)
    {
        return $query->where('is_active', true)
                     ->orderBy('order');
    }
}