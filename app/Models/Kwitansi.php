<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kwitansi extends Model
{
    use HasFactory;
    protected $table = 'kwitansi';
    protected $guarded = [];

    public function surat()
    {
        return $this->belongsTo(Surat::class);
    }
    public function kwitansiDetail()
    {
        return $this->hasMany(KwitansiDetail::class);
    }
}
