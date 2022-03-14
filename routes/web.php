<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CekLogin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('cekLogin');
});

Route::get('/cekLogin', [CekLogin::class, 'index'])->middleware('auth')->name('cekLogin');

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/crud.php';
require __DIR__ . '/cetak.php';
