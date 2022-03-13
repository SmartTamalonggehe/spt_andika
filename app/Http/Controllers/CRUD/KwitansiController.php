<?php

namespace App\Http\Controllers\CRUD;

use Carbon\Carbon;
use App\Models\Kwitansi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class KwitansiController extends Controller
{
    protected function spartaValidation($request, $id = "")
    {
        $validator = Validator::make($request, [
            'surat_id' => 'required',
            'kode_rek' => 'required',
            'tgl_kwitansi' => 'required',
            'terima' => 'required',
            'banyak' => 'required',
            'terbilang' => 'required',
            'pergi' => 'required',
            'pulang' => 'required',
        ]);

        if ($validator->fails()) {
            $pesan = [
                'judul' => 'Gagal',
                'pesan' => $validator->errors()->first(),
                'type' => 'error'
            ];
            return response()->json($pesan);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kwitansi::with('surat')->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('banyak', function ($data) {
                $currecy = 'Rp. ' . number_format($data->banyak, 0, '.', ',');
                return $currecy;
            })
            ->editColumn('pergi', function ($data) {
                $currecy = 'Rp. ' . number_format($data->pergi, 0, '.', ',');
                return $currecy;
            })
            ->editColumn('pulang', function ($data) {
                $currecy = 'Rp. ' . number_format($data->pulang, 0, '.', ',');
                return $currecy;
            })
            ->editColumn('tgl_kwitansi', function ($data) {
                $formatedDate = Carbon::createFromFormat('Y-m-d', $data->tgl_kwitansi)->format('d M Y');
                return $formatedDate;
            })
            ->addColumn(
                'action',
                function ($data) {
                    return '
                    <a href="/admin/kwitansiDetail/' . $data->id . '" class="btn btn-secondary btn-sm">Rincian</a>
                    <button type="button" class="btn btn-warning btnUbah btn-sm" data-id="' . $data->id . '">Ubah</button>
                    <button type="button" data-id="' . $data->id . '" class="btn btn-danger btnHapus btn-sm">Delete</button>
                    ';
                }
            )
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['tgl_kwitansi'] = Carbon::parse($request->tgl_kwitansi)->format('Y-m-d');
        $data['banyak'] = Str::remove([',', 'Rp.', ' '], $request->banyak);
        $data['pergi'] = Str::remove([',', 'Rp.', ' '], $request->pergi);
        $data['pulang'] = Str::remove([',', 'Rp.', ' '], $request->pulang);

        $validate = $this->spartaValidation($data);
        if ($validate) {
            return $validate;
        }

        Kwitansi::create($data);
        $pesan = [
            'judul' => 'Berhasil',
            'pesan' => 'Data Telah Ditambahkan',
            'type' => 'success'
        ];
        return response()->json($pesan);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Kwitansi::findOrFail($id);
        $data->tgl_kwitansi = Carbon::parse($data->tgl_kwitansi)->format('d M Y');
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['tgl_kwitansi'] = Carbon::parse($request->tgl_kwitansi)->format('Y-m-d');
        $data['banyak'] = Str::remove([',', 'Rp.', ' '], $request->banyak);
        $data['pergi'] = Str::remove([',', 'Rp.', ' '], $request->pergi);
        $data['pulang'] = Str::remove([',', 'Rp.', ' '], $request->pulang);

        $validate = $this->spartaValidation($data);
        if ($validate) {
            return $validate;
        }

        Kwitansi::findOrFail($id)->update($data);
        $pesan = [
            'judul' => 'Berhasil',
            'pesan' => 'Data Telah Diubah',
            'type' => 'success'
        ];
        return response()->json($pesan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kwitansi::destroy($id);
        $pesan = [
            'judul' => 'Berhasil',
            'pesan' => 'Data Telah Dihapus',
            'type' => 'success'
        ];
        return response()->json($pesan);
    }
}
