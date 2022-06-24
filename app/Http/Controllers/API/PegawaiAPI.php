<?php

namespace App\Http\Controllers\API;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PegawaiAPI extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all();
        return response()->json($pegawai, 200);
    }
}
