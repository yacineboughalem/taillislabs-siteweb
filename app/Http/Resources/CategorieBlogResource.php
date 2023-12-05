<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategorieBlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
            return [
                    'id'                =>  $this->id,
                    'name'              =>  $this->name,
                    'slug'              =>  $this->slug,
                    'image'             =>  $this->image ? url('/storage/'.$this->image):"",
                    // 'blogs_count'       =>  $this->blogs_front->count(),
                    'created_at'        =>  $this->created_at ? $this->created_at->format('Y-m-d') : "",
                  ];
    }
}
