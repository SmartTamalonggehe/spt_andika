<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Potongan extends Model
{
    use HasFactory;
    protected $table = 'potongan';
    protected $guarded = [];

    public function gaji()
    {
        return $this->belongsTo(Gaji::class);
    }
}
