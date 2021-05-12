<?php

namespace App\Http\Resources;

use App\Models\Enrollment;
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
            'students' => [
                'count' => $this->students()->where('payment_status', 1)->count(),
                'feedback_avg' => number_format($this->students()->where('feedback_stars', '<>', null)->avg('feedback_stars'), 1),
                'feedback_count' => $this->students()->where('feedback_stars', '<>', null)->count()
            ],
            'photo' => $this->photo,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
