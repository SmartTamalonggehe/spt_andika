<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KwitansiDetail extends Model
{
    use HasFactory;
    protected $table = 'kwitansi_detail';
    protected $guarded = [];

    public function kwitansi()
    {
        return $this->belongsTo(Kwitansi::class);
    }
}
