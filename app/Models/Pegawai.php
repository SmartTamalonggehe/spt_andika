<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class, 'pegawai_id', 'id');
    }
}
