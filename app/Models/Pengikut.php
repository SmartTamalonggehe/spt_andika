<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengikut extends Model
{
    use HasFactory;
    protected $table = 'pengikut';
    protected $guarded = [];

    public function surat()
    {
        return $this->belongsTo(Surat::class);
    }
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
