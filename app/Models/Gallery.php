<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    protected $fillable = [
        'slug',
        'file_path',
        'is_featured'
    ];


    protected $casts = [
        'is_featured' => 'boolean'
    ];


    // Optional: Delete file when model is deleted
    public function delete()
    {
        if ($this->file_path) {
            Storage::delete($this->file_path);
        }
        
        return parent::delete();
    }
}