<?php

namespace App\Models;

use App\Observers\CourseUserObserver;
use Illuminate\Database\Eloquent\Model;

class CourseUser extends Model
{
    use CourseUserObserver;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id', 'course_id', 'percentage_passing'
    ];
    public $timestamps = false;
}
