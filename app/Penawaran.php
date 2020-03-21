<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penawaran extends Model
{
    protected $table = 'penawaran';

    protected $fillable = [
        'perbaikan_id', 'jumlah_penawaran', 'verified', 'user', 'perusahaan_id'
    ];

    protected $casts = [
        'user' => 'array'
    ];

    protected $appends = [
        'total_setelah_penawaran',
        'jumlah_penawaran_nominal'
    ];

    public static function getDataStatus()
    {
        return [
            'ditolak',
            'diproses',
            'disetujui'
        ];
    }

    public function getTotalSetelahPenawaranAttribute($key)
    {
        return ($this->perbaikan->total_biaya - (($this->perbaikan->total_biaya * $this->jumlah_penawaran) / 100));
    }

    public function getJumlahPenawaranNominalAttribute($key)
    {
        return (($this->perbaikan->total_biaya * $this->jumlah_penawaran) / 100);
    }

    public function perbaikan()
    {
        return $this->belongsTo(Perbaikan::class);
    }

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }
}
