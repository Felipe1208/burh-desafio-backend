<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobType extends BaseModel
{
    use HasFactory;

    public const CLT = 1;
    public const PJ = 2;
    public const ESTAGIO = 3;
}
