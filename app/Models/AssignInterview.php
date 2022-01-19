<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignInterview extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','application_code', 'vacancy_id', 'interview_id', 'employer_id', 'status'];
    
}
