<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    use HasFactory;

    public const CLT = 1;
    public const PJ = 2;
    public const ESTAGIO = 3;
}
