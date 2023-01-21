<?php

namespace App\Http\Controllers\CRUD;

use Illuminate\Http\Request;
use App\Models\UploadDokumen;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class UploadDokumenController extends Controller
{
    // validation
    protected function spartaValidation($request, $id = "")
    {
        $validator = Validator::make($request, [
            'nama' => 'required',
            'file_dokumen' => 'required',
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
        $user_id = auth()->user()->id;
        $data = UploadDokumen::where('user_id', $user_id)->get();
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
            ->editColumn(
                'file_dokumen',
                function ($data) {
                    $img = '<a href="' . $data->file_dokumen . '">
                                Download dokumen
                            </a>';
                    return $img;
                }
            )
            ->rawColumns(['action', 'file_dokumen'])
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

        $validate = $this->spartaValidation($data);
        if ($validate) {
            return $validate;
        }

        // save picture to storage if exist
        if ($request->hasFile('file_dokumen')) {
            $file = $request->file('file_dokumen');
            // get extension
            $extension = $file->getClientOriginalExtension();
            // generate new name
            $fileName = time() . '.' . $extension;
            $request->file('file_dokumen')->storeAs('public/file-dokumen', $fileName);
            $saveName = "/storage/file-dokumen/" . $fileName;
        } else {
            $saveName = "/storage/default.png";
        }

        // save data to database
        $data['file_dokumen'] = $saveName;
        $data['user_id'] = auth()->user()->id;

        UploadDokumen::create($data);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return UploadDokumen::findOrFail($id);
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
        $validate = $this->spartaValidation($data);
        if ($validate) {
            return $validate;
        }
        // find data by id
        $bukti = UploadDokumen::find($id);
        $bukti_foto = $bukti->file_dokumen;

        // save picture to storage if exist
        if ($request->hasFile('file_dokumen')) {
            $path = public_path($bukti_foto);
            // if file exists
            if (file_exists($path)) {
                // if foto /storage/foto/default.png
                if ($bukti_foto != "/storage/default.png") {
                    // delete file
                    unlink($path);
                }
            }
            $file = $request->file('file_dokumen');
            // get extension
            $extension = $file->getClientOriginalExtension();
            // generate new name
            $fileName = time() . '.' . $extension;
            $request->file('file_dokumen')->storeAs('public/file-dokumen', $fileName);
            $saveName = "/storage/file-dokumen/" . $fileName;
        } else {
            $saveName = $bukti_foto;
        }

        // save data to database
        $data['file_dokumen'] = $saveName;


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
        $data = UploadDokumen::find($id);
        $file = $data->file_dokumen;
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
