<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Satuan extends Model
{
    protected $table = 'satuan';

    protected $fillable = ['id', 'nama'];

    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = Str::lower($value);
    }
}
