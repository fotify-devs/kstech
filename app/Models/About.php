<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;


class About extends Model
{
    protected $fillable = [
        'heading',
        'sub_heading',
        'about_text',
        'button_text',
        'image',
        'video_id'
    ];


    public function setImageAttribute($value)
    {
        // If the value is null, keep the existing image
        if ($value === null) {
            return;
        }


        // If the value is already a string (existing file path), keep it
        if (is_string($value)) {
            $this->attributes['image'] = $value;
            return;
        }


        // If it's a new file upload
        if ($value instanceof UploadedFile) {
            // Delete the old image if it exists
            if ($this->image) {
                Storage::disk('public')->delete($this->image);
            }


            // Store the new image
            $this->attributes['image'] = $value->store('about-images', 'public');
        }
    }


    // Accessor to get full image URL
    public function getImageUrlAttribute()
    {
        return $this->image ? Storage::url($this->image) : null;
    }
}