<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'plan_id',
        'cnpj',
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function exceededJobsQuota(): bool
    {
        $quota = [
            Plan::FREE => Plan::MAX_JOBS_FOR_FREE,
            Plan::PREMIUM => Plan::MAX_JOBS_FOR_PREMIUM,
        ];

        return $this->jobs_count >= $quota[$this->plan_id];
    }

}
