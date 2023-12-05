<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'admin_id',
        'title',
        'slug',
        'image',
        'short',
        'body',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'meta_image',
        'status',
        'is_approved',
    ];

    public function collections()
    {
        return $this->morphToMany(Collection::class, 'collectionable');
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }

    public function scopeApproved($query)
    {
        return $query->where('is_approved', 1);
    }
    public function scopePublished($query)
    {
        return $query->where('status', 1);
    }

    public function scopeEnabled($query)
    {
        return $query->where("status", 1);
    }


    public function getNextAttribute()
    {
        return static::where('id', '>', $this->id)->orderBy('id', 'asc')->first();
    }

    public  function getPreviousAttribute()
    {
        return static::where('id', '<', $this->id)->orderBy('id', 'desc')->first();
    }
}
