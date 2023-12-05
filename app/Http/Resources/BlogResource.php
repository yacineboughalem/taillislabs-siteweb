<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
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
                    'title'             =>  $this->title,
                    'image'             =>  $this->image ? url('/storage/posts/'.$this->image) :"",
                    'description'       =>  $this->description,
                    'slug'              =>  $this->slug,
                    'categories_count'  =>  $this->categories_count,
                    'categories'        =>  CategorieBlogResource::collection($this->categories), 
                    'created_at'        =>  $this->created_at ? $this->created_at->format('Y-m-d') : "",
                  ];






}


}
