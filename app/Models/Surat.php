<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Surat extends Model
{
    use HasFactory, SoftDeletes;

    //protected $table = "detail_sjs";
    protected $fillable = [
        'date_send',
        'hal',
        'date_bayar',
        'norek_id',
        'semester',
        'kemahasiswaan_id',

    ];

    public function norek()
    {
        return $this->belongsTo(Rekening::class, 'norek_id', 'id');
    }
    public function kemahasiswaan()
    {
        return $this->belongsTo(Kemahasiswaan::class, 'kemahasiswaan_id', 'id');
    }
}
