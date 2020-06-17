<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kapal extends Model
{
    use SoftDeletes;
    protected $table = 'kapal';

    protected $fillable = [
        'id', 'perusahaan_id',
        'nama_kapal', 'jenis_kapal',
        'ukuran_panjang', 'ukuran_panjang_satuan',
        'ukuran_lebar', 'ukuran_lebar_satuan',
        'ukuran_tinggi', 'ukuran_tinggi_satuan',
        'ukuran_sarat', 'ukuran_sarat_satuan',
        'ukuran_gt', 'ukuran_gt_satuan',
        'tanggal_masuk', 'tanggal_keluar'
    ];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }

    public function perbaikan()
    {
        return $this->hasMany(Perbaikan::class);
    }
}
