<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'student_capacity' => $this->student_capacity,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'has_certificate' => $this->has_certificate,
            'lessons' => $this->lessons
        ];
    }
}
