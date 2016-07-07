<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function scores()
    {
        return $this->hasMany('App\Score');
    }

    public function isTeacher()
    {
        if ($this->role === 'teacher')
            return true;

        return false;
    }

    public function inClass()
    {
        switch ($this->role) {
            case 'first_class' :
                return 'Première S';
                break;
            case 'final_class' :
                return 'Terminale S';
                break;
            default :
                return 'Erreur';
                break;
        }
    }

    public function scopeStudent($query)
    {
        return $query->where('role', '!=', 'teacher');
    }

    public function scopeLast($query, $limit = 3)
    {
        return $query->orderBy('created_at', 'DESC')->take($limit);
    }

    public function score()
    {
        $total = 0;
        foreach ($this->scores as $score) {
            $total += $score->note;
        }

        return $total;
    }

    public function scoreMax()
    {
        $total = 0;
        $qcm = [];
        foreach ($this->scores as $score) {
            array_push($qcm, $score->question_id);
        }
        foreach ($qcm as $question) {
            $total += Choice::where('question_id', $question)->get()->count();
        }

        return $total;
    }

    public function madeQCM()
    {
        return count($this->scores);
    }

    public function newQCM()
    {
        $qcm = [];
        foreach ($this->scores as $score) {
            array_push($qcm, $score->question_id);
        }

        return Question::publish()->whereNotIn('id', $qcm)->get()->count();
    }

    public function scoreByQuestion(\App\Question $question)
    {
        $score = Score::where(['question_id' => $question->id, 'user_id' => $this->id])->first();
        $score = $score ? $score->note : 0;

        return $score;
    }

    public function maxScoreByQuestion(\App\Question $question)
    {
        return Choice::where('question_id', $question->id)->get()->count();
    }

    public function scoreAverage($average = 20)
    {
        if ($this->scoreMax()) return round(($this->score() * $average) / $this->scoreMax(), 1);
    }


    public function isNumber()
    {
        $total = User::student()->where('role', $this->role)->get()->count();
        $position = 1;

        foreach (User::student()->get() as $student) {
            if ($this->scoreAverage() < $student->scoreAverage())
                $position++;
        }

        return $position . '/' . $total;
    }
}
