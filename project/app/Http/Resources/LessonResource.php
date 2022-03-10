<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'theme' => $this->theme,
            'course_id' => $this->course_id,
        ];
    }
}
