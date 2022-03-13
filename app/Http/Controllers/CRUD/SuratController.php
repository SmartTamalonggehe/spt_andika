<?php

namespace App\Http\Controllers\CRUD;

use Carbon\Carbon;
use App\Models\Surat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class SuratController extends Controller
{
    // validation
    protected function spartaValidation($request, $id = "")
    {
        $validator = Validator::make($request, [
            'pegawai_id' => 'required',
            'tgl_surat' => 'required',
            'no_surat' => 'required',
            'jenis_surat' => 'required',
            'dasar' => 'required',
            'dari' => 'required',
            'tujuan' => 'required',
            'maksud' => 'required',
            'alat_angkut' => 'required',
            'lama' => 'required',
            'tgl_berangkat' => 'required',
            'tgl_kembali' => 'required',
            'beban_anggaran' => 'required',
            'mata_anggaran' => 'required',
            'keterangan' => 'required',
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
        //
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
        $data['tgl_surat'] = Carbon::parse($request->tgl_surat)->format('Y-m-d');

        $validate = $this->spartaValidation($data);
        if ($validate) {
            return $validate;
        }

        Surat::create($data);
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
        $data = Surat::where('jenis_surat', $id)->with('pegawai')->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('lama', function ($data) {
                return $data->lama . ' Hari';
            })
            ->editColumn('tgl_surat', function ($data) {
                $formatedDate = Carbon::createFromFormat('Y-m-d', $data->tgl_surat)->format('d M Y');
                return $formatedDate;
            })
            ->addColumn(
                'pengikut',
                function ($data) {
                    return '<a href="/admin/pengikut/' . $data->id . '" class="btn btn-secondary btn-sm">Lihat</a>';
                }
            )
            ->addColumn(
                'action',
                function ($data) {
                    return '<button type="button" class="btn btn-warning btnUbah btn-sm" data-id="' . $data->id . '">Ubah</button>
                    <button type="button" data-id="' . $data->id . '" class="btn btn-danger btnHapus btn-sm">Delete</button>
                    ';
                }
            )
            ->rawColumns(['pengikut', 'action'])
            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Surat::findOrFail($id);
        $data->tgl_surat = Carbon::parse($data->tgl_surat)->format('d M Y');
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
        $data['tgl_surat'] = Carbon::parse($request->tgl_surat)->format('Y-m-d');
        $validate = $this->spartaValidation($data);
        if ($validate) {
            return $validate;
        }

        Surat::findOrFail($id)->update($data);
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
        Surat::destroy($id);
        $pesan = [
            'judul' => 'Berhasil',
            'pesan' => 'Data Telah Dihapus',
            'type' => 'success'
        ];
        return response()->json($pesan);
    }
}
