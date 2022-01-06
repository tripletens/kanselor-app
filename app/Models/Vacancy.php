<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'experience', 'qualification', 'status', 'from_age', 'to_age', 'is_admin', 'is_employer', 'uploader_id', 'employer_id', 'tribe','code'];
}
