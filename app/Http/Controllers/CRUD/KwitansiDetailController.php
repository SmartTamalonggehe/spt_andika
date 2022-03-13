<?php

namespace App\Http\Controllers\CRUD;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KwitansiDetail;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class KwitansiDetailController extends Controller
{
    protected function spartaValidation($request, $id = "")
    {
        $validator = Validator::make($request, [
            'kwitansi_id' => 'required',
            'uraian' => 'required',
            'lama' => 'required',
            'jumlah' => 'required',
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
    public function index(Request $request)
    {
        $kwitansi_id = $request->kwitansi_id;
        $data = KwitansiDetail::where('kwitansi_id', $kwitansi_id)->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('lama', function ($data) {
                return $data->lama . ' Hari';
            })
            ->editColumn('jumlah', function ($data) {
                $currecy = 'Rp. ' . number_format($data->jumlah, 0, '.', ',');
                return $currecy;
            })
            ->addColumn(
                'action',
                function ($data) {
                    return '<button type="button" class="btn btn-warning btnUbah btn-sm" data-id="' . $data->id . '">Ubah</button>
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
        $data['jumlah'] = Str::remove([',', 'Rp.', ' '], $request->jumlah);

        $validate = $this->spartaValidation($data);
        if ($validate) {
            return $validate;
        }

        KwitansiDetail::create($data);
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
        $data = KwitansiDetail::findOrFail($id);
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
        $data['jumlah'] = Str::remove([',', 'Rp.', ' '], $request->jumlah);

        $validate = $this->spartaValidation($data);
        if ($validate) {
            return $validate;
        }
        KwitansiDetail::findOrFail($id)->update($data);
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
        KwitansiDetail::destroy($id);
        $pesan = [
            'judul' => 'Berhasil',
            'pesan' => 'Data Telah Dihapus',
            'type' => 'success'
        ];
        return response()->json($pesan);
    }
}
