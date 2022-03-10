<?php

namespace App\Rules;

use App\Models\LessonUser;
use Illuminate\Contracts\Validation\Rule;

class ComplitedLesson implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        return LessonUser::where([
            'lesson_id' => $value,
            'user_id' => auth()->user()->id
        ])->first()->is_passed == 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute has been complited.';
    }
}
