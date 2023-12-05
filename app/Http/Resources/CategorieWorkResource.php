<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategorieWorkResource extends JsonResource
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
                    'body'              =>  $this->body,
                    'logo'             =>  $this->logo ? url('/storage/images/'.$this->logo):"",
                    'created_at'        =>  $this->created_at ? $this->created_at->format('Y-m-d') : "",
                  ];
    }
}
