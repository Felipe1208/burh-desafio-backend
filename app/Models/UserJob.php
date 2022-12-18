<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserJob extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_id',
    ];

    public function jobs()
    {
        return $this->belongsToMany(Job::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
