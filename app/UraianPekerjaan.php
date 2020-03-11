<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UraianPekerjaan extends Model
{
    protected $table = 'uraian_pekerjaan';

    protected $fillable = [
        'kategori_pekerjaan_id', 'deskripsi',
        'volume_nilai',
        'volume_satuan',
        'harga'
    ];

    public function kategoriPekerjaan()
    {
        return $this->hasOne(KategoriPekerjaan::class);
    }
}
