<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Gaji;
use Illuminate\Http\Request;

class GajiAPI extends Controller
{
    public function index()
    {
        $gaji = Gaji::all();
        return response()->json($gaji, 200);
    }
}
