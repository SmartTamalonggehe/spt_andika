<?php

namespace App\Http\Controllers\API;

use App\Models\Surat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuratAPI extends Controller
{
    public function index()
    {
        $surat = Surat::all();
        return response()->json($surat, 200);
    }
}
