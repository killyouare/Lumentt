<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title', 'student_capacity', 'start_date', 'end_date', 'has_certificate'
    ];
    protected $guarded = [
        'id'
    ];
    public $timestamps = false;

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
