<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;
    protected $table = 'gaji';
    protected $guarded = [];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
    public function potongan()
    {
        return $this->hasMany(Potongan::class);
    }
    public function tunjangan()
    {
        return $this->hasMany(Tunjangan::class);
    }
}
