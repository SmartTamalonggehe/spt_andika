<?php

namespace App\Http\Controllers\API;

use App\Models\Kwitansi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KwitansiAPI extends Controller
{
    public function index()
    {
        $kwitansi = Kwitansi::all();
        return response()->json($kwitansi, 200);
    }
}
