<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class reaktif extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'surat_id',
        'template_id',
        'semester',
        'nim',
        'mahasiswa',
        'email',
        'i_tambahan',
        'tgl_batas'

    ];
}
