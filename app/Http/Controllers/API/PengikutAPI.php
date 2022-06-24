<?php

namespace App\Http\Controllers\API;

use App\Models\Pengikut;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengikutAPI extends Controller
{
    public function index()
    {
        $pengikut = Pengikut::all();
        return response()->json($pengikut, 200);
    }
}
