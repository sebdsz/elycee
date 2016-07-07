<?php

namespace App\Policies;


use App\Score;
use App\User;
use App\Question;

class QCMPolicy
{
    public function can(User $user, Question $question)
    {
        $score = Score::where(['user_id' => $user->id, 'question_id' => $question->id])->first();
        if ($score)
            return false;

        return true;
    }
}
