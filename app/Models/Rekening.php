<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rekening extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "rekenings";
    protected $fillable = [
        'bank',
        'no_rek',
        'nama_rek',

    ];

    // public function mahasiswa()
    // {
    //     return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'id');
    // }
}
