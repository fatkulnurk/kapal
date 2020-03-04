<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class JenisKapal extends Model
{
    protected $table = 'jenis_kapal';

    protected $fillable = ['id', 'nama'];

    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = Str::upper($value);
    }
}
