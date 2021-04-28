<?php

namespace App\Http\Resources;

use App\Models\SubSubCategory;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\SubSubCategoryResource;

class CourseResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'goals' => $this->goals,
            'requirements' => $this->requirements,
            'status' => $this->status,
            'duration' => $this->duration,
            'price' => $this->price,
            'subsubcategory' => new SubSubCategoryResource($this->subsubcategory),
            'students' => UserResource::collection($this->students)->count(),
            'photo' => $this->photo,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
