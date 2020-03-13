<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perbaikan extends Model
{
    protected $table = 'perbaikan';

    protected $fillable = ['kapal_id'];

    public function kapal()
    {
        return $this->belongsTo(Kapal::class);
    }

    public function kategoriPekerjaan()
    {
        return $this->hasMany(KategoriPekerjaan::class);
    }
}
