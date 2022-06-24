<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\KwitansiDetail;
use App\Http\Controllers\Controller;

class KwitansiDetAPI extends Controller
{
    public function index()
    {
        $kwitansiDet = KwitansiDetail::all();
        return response()->json($kwitansiDet, 200);
    }
}
