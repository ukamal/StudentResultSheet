<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = ['student_id', 'subject_id', 'marks'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function getGradeAttribute()
    {
        if ($this->marks >= 80) {
            return 'A+';
        }

        if ($this->marks < 80 && $this->marks >= 70) {
            return 'A';
        }

        if ($this->marks < 70 && $this->marks >= 60) {
            return 'A-';
        }

        if ($this->marks < 60 && $this->marks >= 50) {
            return 'B';
        }

        if ($this->marks < 50 && $this->marks >= 40) {
            return 'C';
        }

        if ($this->marks < 40 && $this->marks >= 33) {
            return 'D';
        }

        if ($this->marks < 33) {
            return 'F';
        }
    }
}
