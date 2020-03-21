<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $table = 'perusahaan';

    protected $fillable = [
        'id', 'nama'
    ];

    public function kapal()
    {
        return $this->hasMany(Kapal::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
//
//    public function owner()
//    {
//        return $this->belongsTo(User::class);
//    }
    public function penawaran()
    {
        return $this->hasMany(Penawaran::class);
    }
}
