<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = ['parent_id', 'name'];

    public function childs()
    {
    	return $this->hasMany(Collection::class, 'parent_id');
    }

    public function parent()
    {
    	return $this->belongsTo(Collection::class, 'parent_id');
    }

    public function scopeEnabled($query)
    {
        return $query->where("status", 1);
    }

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'collectionable');
    }

 
}
