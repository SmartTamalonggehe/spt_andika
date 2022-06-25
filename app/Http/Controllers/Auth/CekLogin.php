<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CekLogin extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->hasRole(['kepegawaian', 'keuangan', 'pegawai', 'ketua'])) {
            return redirect()->route('admin.dashboard');
        }
    }
}
