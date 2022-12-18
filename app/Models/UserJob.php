<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserJob extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_id',
    ];
}
