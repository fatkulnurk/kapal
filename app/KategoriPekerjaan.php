<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class KategoriPekerjaan extends Model
{
    protected $table = 'kategori_pekerjaan';
    protected $fillable = ['id', 'nama', 'deskripsi', 'perbaikan_id'];
    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = Str::lower($value);
    }

    public function perbaikan()
    {
        return $this->belongsTo(Perbaikan::class);
    }

    public function uraianPekerjaan()
    {
        return $this->hasMany(UraianPekerjaan::class);
    }
}
