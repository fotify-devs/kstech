<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesRegistrationNumber;

class Student extends Model
{
    use GeneratesRegistrationNumber;


    protected $fillable = [
        'registration_number', 'first_name', 'last_name', 'email', 'phone',
        'course_id', 'education_level_id', 'mean_grade', 'fee_sponsor',
        'course_level', 'nationality', 'next_of_kin_name',
        'next_of_kin_number', 'heard_about', 'status'
    ];


    public function course()
    {
        return $this->belongsTo(Course::class);
    }


    public function educationLevel()
    {
        return $this->belongsTo(EducationLevel::class);
    }
}
