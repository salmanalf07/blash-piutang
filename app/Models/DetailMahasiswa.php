<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailMahasiswa extends Model
{
    use HasFactory, SoftDeletes;

    //protected $table = "detail_sjs";
    protected $fillable = [
        'mahasiswa_id',
        'bp3',
        'bp3_tempo',
        'sks',
        'sks_tempo',
        'lab',
        'lab_tempo',
        'uniform',
        'uniform_tempo',
        'alat',
        'alat_tempo',
        'dp31',
        'dp31_tempo',
        'dp32',
        'dp32_tempo',
        'total'

    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'id');
    }
}
