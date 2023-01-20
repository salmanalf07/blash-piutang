<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class reminderKrs3 extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nim',
        'name',
        'email',
        'semester',
        'date_regist',
        'jatem',
        'status',

    ];
}
