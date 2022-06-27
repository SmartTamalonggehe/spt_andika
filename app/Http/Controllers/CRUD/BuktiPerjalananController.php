<?php

namespace App\Http\Controllers\CRUD;

use Illuminate\Http\Request;
use App\Models\BuktiPerjalanan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class BuktiPerjalananController extends Controller
{
    // validation
    protected function spartaValidation($request, $id = "")
    {
        $validator = Validator::make($request, [
            'surat_id' => 'required',
            'nama_file' => 'required',
            'path_file' => 'required',
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
        $data['nama_file'] = 'Bukti Perjalanan';

        $validate = $this->spartaValidation($data);
        if ($validate) {
            return $validate;
        }

        // save picture to storage if exist
        if ($request->hasFile('path_file')) {
            $file = $request->file('path_file');
            // get extension
            $extension = $file->getClientOriginalExtension();
            // generate new name
            $fileName = time() . '.' . $extension;
            $request->file('path_file')->storeAs('public/bukti-perjalanan', $fileName);
            $saveName = "/storage/bukti-perjalanan/" . $fileName;
        } else {
            $saveName = "/storage/default.png";
        }

        // save data to database
        $data['path_file'] = $saveName;

        BuktiPerjalanan::create($data);
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
        $data = BuktiPerjalanan::where('surat_id', $id)->with('surat')->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn(
                'action',
                function ($data) {
                    return '<button type="button" class="btn btn-warning btnUbah btn-sm" data-id="' . $data->id . '">Ubah</button>
                    <button type="button" data-id="' . $data->id . '" class="btn btn-danger btnHapus btn-sm">Delete</button>
                    ';
                }
            )
            ->addColumn(
                'path_file',
                function ($data) {
                    $img = '<a href="' . $data->path_file . '" data-lightbox="path_file">
                                <img src="' . $data->path_file . '" alt="' . $data->path_file . '" height="60px">
                            </a>';
                    return $img;
                }
            )
            ->rawColumns(['action', 'path_file'])
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
        return BuktiPerjalanan::findOrFail($id);
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
        $data['nama_file'] = 'Bukti Perjalanan';
        $validate = $this->spartaValidation($data);
        if ($validate) {
            return $validate;
        }
        // find data by id
        $bukti = BuktiPerjalanan::find($id);
        $bukti_foto = $bukti->path_file;

        // save picture to storage if exist
        if ($request->hasFile('path_file')) {
            $path = public_path($bukti_foto);
            // if file exists
            if (file_exists($path)) {
                // if foto /storage/foto/default.png
                if ($bukti_foto != "/storage/default.png") {
                    // delete file
                    unlink($path);
                }
            }
            $file = $request->file('path_file');
            // get extension
            $extension = $file->getClientOriginalExtension();
            // generate new name
            $fileName = time() . '.' . $extension;
            $request->file('path_file')->storeAs('public/bukti-perjalanan', $fileName);
            $saveName = "/storage/bukti-perjalanan/" . $fileName;
        } else {
            $saveName = $bukti_foto;
        }

        // save data to database
        $data['path_file'] = $saveName;


        $bukti->update($data);
        $pesan = [
            'judul' => 'Berhasil',
            'pesan' => 'Data Telah Ditambahkan',
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
        // remove storage
        $data = BuktiPerjalanan::find($id);
        $file = $data->path_file;
        $path = public_path($file);
        // if file exists
        if (file_exists($path)) {
            // if foto /storage/foto/default.png
            if ($file != "/storage/default.png") {
                // delete file
                unlink($path);
            }
        }
        // remove data
        $data->delete();
        $pesan = [
            'judul' => 'Berhasil',
            'pesan' => 'Data Telah Ditambahkan',
            'type' => 'success'
        ];
        return response()->json($pesan);
    }
}
