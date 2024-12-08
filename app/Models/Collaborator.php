<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Collaborator extends Model
{
    protected $fillable = [
        'name', 
        'logo', 
        'website_url', 
        'is_active', 
        'sort_order'
    ];


    public function getLogoUrlAttribute()
    {
        return $this->logo ? Storage::url($this->logo) : null;
    }
}