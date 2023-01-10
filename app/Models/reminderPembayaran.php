<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class reminderPembayaran extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'student_id',
        'email',
        'semester_now',
        'jatem',
        'i_tambahan',
        'status',
    ];

    public function detReminPem1()
    {
        return $this->hasMany(detReminPemb1::class, 'reminPembId', 'id');
    }

    public function detReminPem2()
    {
        return $this->hasMany(detReminPemb2::class, 'reminPembId', 'id');
    }

    // public static function boot()
    // {
    //     parent::boot();
    //     self::deleting(function ($post) { // before delete() method call this
    //         $post->detReminPem1()->each(function ($detReminPem1) {
    //             $detReminPem1->forceDelete(); // <-- direct deletion
    //         });
    //         $post->detReminPem2()->each(function ($detReminPem2) {
    //             $detReminPem2->forceDelete(); // <-- direct deletion
    //         });
    //     });
    // }
}
