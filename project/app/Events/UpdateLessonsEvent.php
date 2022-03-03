<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Queue\SerializesModels;

class UpdateLessonsEvent extends Event
{
    use InteractsWithSockets, SerializesModels;

    public $course_id;

    public function __construct($course_id)
    {
        $this->course_id = $course_id;
    }

}
