<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class KategoriPekerjaan extends Model
{
    protected $table = 'kategori_pekerjaan';
    protected $fillable = ['id', 'nama'];
    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = Str::lower($value);
    }
}
