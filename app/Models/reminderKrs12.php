<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class reminderKrs12 extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'type',
        'nim',
        'name',
        'email',
        'semester',
        'tagihan',
        'enrollment',
        'jatem',
        'jatem_auto',
        'status',

    ];
}
