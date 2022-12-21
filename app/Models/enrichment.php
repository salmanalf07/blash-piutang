<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class enrichment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'semester',
        'nim',
        'mahasiswa',
        'email',
        'tgl_konfirm',
        'jumlah_sks',
        'harga_sks',
        'bp3',
        'bp3_tempo',
        'sks',
        'sks_tempo',
        'total_tunggakan',
        'i_tambahan',

    ];
}
