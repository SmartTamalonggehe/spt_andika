<?php

namespace App\Http\Controllers\CRUD;

use Carbon\Carbon;
use App\Models\Surat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        $tgl_awal = "1990-01-01";
        $tgl_akhir = Carbon::now();

        if ($request->tgl_awal != "" || $request->$tgl_akhir != "") {
            $tgl_awal = Carbon::parse($request->tgl_awal)->format('Y-m-d');
            $tgl_akhir = Carbon::parse($request->tgl_akhir)->format('Y-m-d');
        }


        // if (count($request->all()) > 0) {
        //     $tgl_awal = Carbon::parse($request->tgl_awal)->format('Y-m-d');
        //     $tgl_akhir = Carbon::parse($request->tgl_akhir)->format('Y-m-d');
        // }

        // return $tgl_awal;

        $data = Surat::where('jenis_surat', $request->id)
            ->whereDate('tgl_surat', '>=', $tgl_awal)
            ->whereDate('tgl_surat', '<=', $tgl_akhir)
            ->with('pegawai');
        if (Auth::user()->name == 'Pegawai') {
            $data = $data->where('status', 'Diterima')->where('pegawai_id', Auth::user()->pegawai_id)->get();
        } else {
            $data = $data->get();
        }
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
            ->editColumn(
                'status',
                function ($data) {
                    $attr = "";
                    if (Auth::user()->name == 'Ketua') {
                        $attr = 'btn-ubah-status';
                    }

                    if ($data->status == 'Diproses') {
                        return '<span role="button" class="badge bg-warning ' . $attr . '" data-id="' . $data->id . '">' . $data->status . '</span>';
                    } else if ($data->status == 'Disetujui') {
                        return '<span role="button" class="badge badge-success ' . $attr . '" data-id="' . $data->id . '">' . $data->status . '</span>';
                    } else if ($data->status == 'Ditolak') {
                        return '<span role="button" class="badge bg-danger ' . $attr . '" data-id="' . $data->id . '">' . $data->status . '</span>';
                    } else {
                        return '<span role="button" class="badge bg-primary ' . $attr . '" data-id="' . $data->id . '">' . $data->status . '</span>';
                    }
                }
            )
            ->addColumn(
                'action',
                function ($data) {
                    $link = "";
                    if ($data->jenis_surat == 'SPT') {
                        $link = "surat_spt";
                    } else {
                        $link = "surat_sppd";
                    };
                    $cetak = '<a href="/cetak/' . $link . '/' . $data->id . '" class="btn btn-info btn-sm ms-1">Cetak</a>
                    <a href="/admin/bukti-perjalanan/' . $data->id . '" class="btn btn-success btn-sm ms-1">Bukti</a>';
                    $btn = "";
                    if (auth()->user()->roles[0]->name == 'kepegawaian') {
                        $btn = '<button type="button" class="btn btn-warning btnUbah btn-sm" data-id="' . $data->id . '">Ubah</button>
                        <button type="button" data-id="' . $data->id . '" class="btn btn-danger btnHapus btn-sm">Delete</button>' . $cetak;
                    } else {
                        $btn = $cetak;
                        // $btn += $bukti;
                    }

                    return $btn;
                }
            )
            ->rawColumns(['pengikut', 'action', 'status'])
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
    public function show($id, Request $request)
    {
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
        $surat = Surat::findOrFail($id);
        $data = $request->all();
        $data['status'] = 'Diproses';

        $pesan = [
            'judul' => 'Berhasil',
            'pesan' => 'Data Telah Diubah',
            'type' => 'success'
        ];
        if (auth()->user()->roles[0]->name == 'ketua') {
            $status = $surat->status;
            if ($status !== 'Diterima') {
                $data['status'] = 'Diterima';
            } else {
                $data['status'] = 'Diproses';
            }
            $surat->update([
                'status' => $data['status']
            ]);
            return response()->json($pesan);
        };

        $data['tgl_surat'] = Carbon::parse($request->tgl_surat)->format('Y-m-d');
        $validate = $this->spartaValidation($data);
        if ($validate) {
            return $validate;
        }

        $surat->update($data);

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
