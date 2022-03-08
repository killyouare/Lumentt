<?php

namespace App\Models;

use App\Observers\LessonCompliteObserver;
use Illuminate\Database\Eloquent\Model;

class LessonUser extends Model
{
    use  LessonCompliteObserver;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id', 'lesson_id', 'is_passed'
    ];
    public $timestamps = false;
}
