<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perbaikan extends Model
{
    protected $table = 'perbaikan';

    protected $fillable = ['kapal_id', 'nomor_transaksi', 'harga_setelah_penawaran'];

    protected $appends = ['total_biaya'];

    public function getTotalBiayaAttribute($key)
    {
        $total = 0;
        foreach($this->kategoriPekerjaan as $kategoriPekerjaan) {
            foreach(optional($kategoriPekerjaan)->uraianPekerjaan as $uraianPekerjaan) {
                $total += ($uraianPekerjaan->volume_nilai * $uraianPekerjaan->harga);
            }
        }

        return $total;
    }

    public function kapal()
    {
        return $this->belongsTo(Kapal::class);
    }

    public function kategoriPekerjaan()
    {
        return $this->hasMany(KategoriPekerjaan::class);
    }

    public function penawaran()
    {
        return $this->hasOne(Penawaran::class);
    }
}
