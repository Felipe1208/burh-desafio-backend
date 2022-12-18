<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends BaseModel
{
    use HasFactory;

    public const FREE = 1;
    public const PREMIUM = 2;

    public const MAX_JOBS_FOR_FREE = 5;
    public const MAX_JOBS_FOR_PREMIUM = 10;
}
