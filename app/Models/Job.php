<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'title',
        'description',
        'job_type_id',
        'salary',
        'start_time',
        'end_time',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

}
