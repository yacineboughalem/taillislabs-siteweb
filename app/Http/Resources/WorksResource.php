<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorksResource extends JsonResource
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
          'id'                  =>  $this->id,
          'title'               =>  $this->title,
          'slug'                =>  $this->slug,
          'image'               =>  $this->image ? url('/storage/works/'.$this->image) :"",
          'short'               =>  $this->short,
          'body'                =>  $this->body,
          'features'            =>  $this->features,
          'status'              =>  $this->status,
          'featured'            =>  $this->featured,
          'meta_title'          =>  $this->meta_title,
          'meta_keywords'       =>  $this->meta_keywords,
          'meta_description'    =>  $this->meta_description,
          'categories_count'    =>  $this->categories_count,
          'categories'          =>  CategorieWorkResource::collection($this->categories), 
          'created_at'          =>  $this->created_at ? $this->created_at->format('Y-m-d') : "",
        ];
    }


}
