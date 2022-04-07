<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mahasiswa extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "mahasiswas";
    protected $fillable = [
        'surat_id',
        'no_surat',
        'template_id',
        'no_formulir',
        'nim',
        'nama',
        'jenjang',
        'email',
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
        'total',

    ];

    public function surat()
    {
        return $this->belongsTo(Surat::class, 'surat_id', 'id');
    }
}
