<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tunjangan extends Model
{
    use HasFactory;
    protected $table = 'tunjangan';
    protected $guarded = [];

    public function gaji()
    {
        return $this->belongsTo(Gaji::class);
    }
}
