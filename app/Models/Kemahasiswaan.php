<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kemahasiswaan extends Model
{
    use HasFactory, SoftDeletes;

    //protected $table = "detail_sjs";
    protected $fillable = [
        'nama',
        'no_phone',
        'ext',

    ];

    // public function mahasiswa()
    // {
    //     return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'id');
    // }
}
