<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class autodebet extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'type',
        'nim',
        'name',
        'email',
        'semester',
        'tgl_batas',
        'biaya',
        'status',

    ];
}
