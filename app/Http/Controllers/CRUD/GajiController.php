<?php

namespace App\Http\Controllers\CRUD;

use Carbon\Carbon;
use App\Models\Gaji;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class GajiController extends Controller
{
    // validation
    protected function spartaValidation($request, $id = "")
    {
        $validator = Validator::make($request, [
            'pegawai_id' => 'required',
            'gaji_pokok' => 'required',
            'pembulatan' => 'required',
            'tgl_gaji' => 'required',
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
        $data = Gaji::with('pegawai')->orderBy('tgl_gaji')->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('tgl_gaji', function ($data) {
                $formatedDate = Carbon::createFromFormat('Y-m-d', $data->tgl_gaji)->format('d M Y');
                return $formatedDate;
            })
            ->editColumn('gaji_pokok', function ($data) {
                $currecy = 'Rp. ' . number_format($data->gaji_pokok, 0, '.', ',');
                return $currecy;
            })
            ->editColumn('pembulatan', function ($data) {
                $currecy = 'Rp. ' . number_format($data->pembulatan, 0, '.', ',');
                return $currecy;
            })
            ->addColumn(
                'details',
                function ($data) {
                    return '
                    <a href="/admin/tunjangan/' . $data->id . '" class="btn btn-secondary btn-sm">Tunjangan</a>
                    <a href="/admin/potongan/' . $data->id . '" class="btn btn-secondary btn-sm">Potongan</a>
                    ';
                }
            )
            ->addColumn(
                'action',
                function ($data) {
                    return '<button type="button" class="btn btn-warning btnUbah btn-sm" data-id="' . $data->id . '">Ubah</button>
                    <button type="button" data-id="' . $data->id . '" class="btn btn-danger btnHapus btn-sm">Delete</button>
                    <a href="/cetak/gaji/' . $data->id . '" target="blank" class="btn btn-info btn-sm">Cetak</a>
                    ';
                }
            )
            ->rawColumns(['details', 'action'])
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
        $data['tgl_gaji'] = Carbon::parse($request->tgl_gaji)->format('Y-m-d');
        $data['gaji_pokok'] = Str::remove([',', 'Rp.', ' '], $request->gaji_pokok);
        $data['pembulatan'] = Str::remove([',', 'Rp.', ' '], $request->pembulatan);

        $validate = $this->spartaValidation($data);
        if ($validate) {
            return $validate;
        }

        Gaji::create($data);
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
        $data = Gaji::findOrFail($id);
        $data->tgl_gaji = Carbon::parse($data->tgl_gaji)->format('d M Y');
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
        $data['tgl_gaji'] = Carbon::parse($request->tgl_gaji)->format('Y-m-d');
        $data['gaji_pokok'] = Str::remove([',', 'Rp.', ' '], $request->gaji_pokok);
        $data['pembulatan'] = Str::remove([',', 'Rp.', ' '], $request->pembulatan);

        $validate = $this->spartaValidation($data);
        if ($validate) {
            return $validate;
        }

        Gaji::findOrFail($id)->update($data);
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
        Gaji::destroy($id);
        $pesan = [
            'judul' => 'Berhasil',
            'pesan' => 'Data Telah Dihapus',
            'type' => 'success'
        ];
        return response()->json($pesan);
    }
}
