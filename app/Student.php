<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name', 'class', 'roll'
    ];

    public function subjects(){
        return $this->hasMany(Subject::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function getCgpaAttribute()
    {
        $results = collect($this->results->pluck('marks'));

        $cgpa = $results->avg();

        return $cgpa;
    }

    public function getCgpa($mark)
    {
        if ($mark >= 80) {
            return 'A+';
        }

        if ($mark < 80 && $mark >= 70) {
            return 'A';
        }

        if ($mark < 70 && $mark >= 60) {
            return 'A-';
        }

        if ($mark < 60 && $mark >= 50) {
            return 'B';
        }

        if ($mark < 50 && $mark >= 40) {
            return 'C';
        }

        if ($mark < 40 && $mark >= 33) {
            return 'D';
        }

        if ($mark < 33) {
            return 'F';
        }
    }
}
