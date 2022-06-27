<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiPerjalanan extends Model
{
    use HasFactory;
    protected $table = 'bukti_perjalanan';
    protected $guarded = [];

    public function surat()
    {
        return $this->belongsTo(Surat::class);
    }
}
