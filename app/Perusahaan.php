<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $table = 'perusahaan';

    protected $fillable = [
        'id', 'nama', 'owner_id'
    ];

    public function kapal()
    {
        return $this->hasMany(Kapal::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
