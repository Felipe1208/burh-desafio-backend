<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'tittle',
        'description',
        'job_type_id',
        'salary',
        'start_time',
        'end_time',
    ];

}
