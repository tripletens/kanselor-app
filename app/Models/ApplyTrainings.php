<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyTrainings extends Model
{
    use HasFactory;
    protected $table = 'apply_trainings';
    protected $fillable = ['training_id', 'fullname', 'email', 'phone', 'address', 'status', 'created_at', 'updated_at'];
}
