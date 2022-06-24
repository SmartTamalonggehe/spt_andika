<?php

namespace App\Http\Controllers\API;

use App\Models\Tunjangan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TunjanganAPI extends Controller
{
    public function index()
    {
        $tunjangan = Tunjangan::all();
        return response()->json($tunjangan, 200);
    }
}
