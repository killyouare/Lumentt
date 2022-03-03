<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Queue\SerializesModels;

class UpdatePercentsEvent extends Event
{
    use InteractsWithSockets, SerializesModels;

    public $lesson_id;

    public function __construct($lesson_id)
    {
        $this->lesson_id = $lesson_id;
    }
}
