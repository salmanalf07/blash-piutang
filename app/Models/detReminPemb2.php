<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class detReminPemb2 extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'reminPembId',
        'semester',
        'daftarUlang',
        'sisaBP3',
        'sisaFPU',
        'sisaSKS-1',
        'sisaSKS-2',
        'sisaDP3',
        'sisaAlat',
        'sisaLab',
        'sisaBuku',
        'beelinguaFee',
        'totalTunggakan',
        'jatemDaftarUlang',
        'jatemBP3',
        'jatemFPU',
        'jatemSKS-1',
        'jatemSKS-2',
        'jatemDP3',
        'jatemAlat',
        'jatemLab',
        'jatemBuku',
        'jatemBeelingua'
    ];
}
