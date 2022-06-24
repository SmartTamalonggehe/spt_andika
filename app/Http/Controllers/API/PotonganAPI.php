<?php

namespace App\Http\Controllers\API;

use App\Models\Potongan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PotonganAPI extends Controller
{
    public function index()
    {
        $potongan = Potongan::all();
        return response()->json($potongan, 200);
    }
}
