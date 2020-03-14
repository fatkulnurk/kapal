<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class KategoriPekerjaanMaster extends Model
{
    protected $table = 'kategori_pekerjaan_masters';
    protected $fillable = ['id', 'nama'];

//    public function setNamaAttribute($value)
//    {
//        $this->attributes['nama'] = Str::lower($value);
//    }
}
