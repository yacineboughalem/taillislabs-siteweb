<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;
    //Add extra attribute
    protected $guarded = [];

    //Make it available in the json response
    protected $appends = ['pathImage','pathThumbnail'];

    protected $hidden = [
        'imageable_id',
        'imageable_type',
        'created_at',
        'updated_at'
    ];

    public function getPathThumbnailAttribute(){
        $file = 'images/thumbnails/'.$this->name;
        return url(Storage::url($file));
    }
    public function getPathImageAttribute(){
        $file = 'images/'.$this->name;
        return url(Storage::url($file));
    }

    public function imageable(){
        return $this->morphTo();
    }
}
