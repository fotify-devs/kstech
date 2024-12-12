<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Setting extends Model
{
    protected $fillable = [
        'site_name',
        'site_logo',
        'favicon',
        'site_description',
        'contact_email',
        'contact_phone',
        'social_links',
    ];


    protected $casts = [
        'social_links' => 'array',
    ];


    // Method to handle logo upload and deletion of previous logo
    public static function updateLogo($file, $field = 'site_logo')
    {
        $setting = self::first() ?? new self();


        // Delete previous logo if exists
        if ($setting->$field && Storage::exists($setting->$field)) {
            Storage::delete($setting->$field);
        }


        // Store new logo
        $path = $file->store('settings', 'public');
        
        return $path;
    }


    // Getter for logo URL
    public function getLogoUrlAttribute()
    {
        return $this->site_logo ? Storage::url($this->site_logo) : null;
    }


    // Getter for favicon URL
    public function getFaviconUrlAttribute()
    {
        return $this->favicon ? Storage::url($this->favicon) : null;
    }


    // Ensure only one settings record exists
    public static function boot()
    {
        parent::boot();


        static::creating(function ($model) {
            // Limit to one record
            self::query()->delete();
        });
    }
    
}