<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class w2bcModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "w2bcs";
    protected $fillable = [
        'nim',
        'name',
        'no_kelompok',
        'nama_kelompok',
        'email',
        'link_wa',
        'list_kelompok',
        'daebak_tgl',
        'daebak_jam',
        'gee_tgl',
        'gee_jam',
        'wardah_tgl',
        'wardah_jam',
        'status'

    ];
}
