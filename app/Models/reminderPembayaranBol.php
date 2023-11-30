<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class reminderPembayaranBol extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nim',
        'name',
        'email',
        'email_cc1',
        'semester',
        'periode_kuliah',
        'date_kuliah',
        'periode_ujian',
        'dateSt_ujian',
        'dateEd_ujian',
        'status',
    ];
}
