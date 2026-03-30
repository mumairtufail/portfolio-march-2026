<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'technologies',
        'likes',
        'type',
        'image_url',
        'github_url',
        'demo_url',
        'is_featured',
        'order'
    ];

    protected $casts = [
        'technologies' => 'array',
        'is_featured' => 'boolean',
    ];

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true)->orderBy('order');
    }

    public function incrementLikes()
    {
        $this->increment('likes');
        return $this;
    }
}
