<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Supports\Eloquent\Sluggable;
use App\Enums\DefaultStatus;
use App\Enums\Is_featured;

class Post1 extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'post1';
    protected $guarded = [];
    protected $columnSlug = 'title';
    // protected $is_featured ='is_featured';

    protected $casts = [
        'status' => DefaultStatus::class,
        'is_featured' => Is_featured::class,
    ];

    public function isPublished()
    {
        return $this->status == DefaultStatus::Published;
    }

    public function scopePublished($query)
    {
        return $query->where('status', DefaultStatus::Published);
    }

    //is_featured
    public function isYes()
    {
        return $this->is_featured == Is_featured::Yes;
    }

    public function scopeYes($query)
    {
        return $query->where('is_featured', Is_featured::Yes);
    }
    //
    
    public function post1()
    {
        return $this->hasMany(Post1::class, 'id');
    }
}
