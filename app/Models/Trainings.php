<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainings extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image','slug', 'status', 'created_at', 'updated_at' ];
}
