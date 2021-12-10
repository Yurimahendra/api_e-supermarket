<?php

namespace App\Http\Controllers\Api;

use App\DataKurir;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\DataKurirResource;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DataKurirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        return DataKurirResource::collection(DataKurir::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'email' => 'required|email',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'no_ponsel' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
           
        ]);

        $gambar = $request->file('gambar');
        $filename = $gambar->getClientOriginalName();
        $filename = $filename;
        $path = $gambar->storeAs('public/gambar', $filename);

       

        $dataKurir = DataKurir::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_ponsel' => $request->no_ponsel,
            'gambar' => $filename
    
        ]);

        return new DataKurirResource($dataKurir);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DataKurir  $dataKurir
     * @return \Illuminate\Http\Response
     */
    public function show($dataKurir)
    {
        return new DataKurirResource(DataKurir::find($dataKurir));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataKurir  $dataKurir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $dataKurir)
    {
        $request->validate([
            'nik' => '',
            'nama' => '',
            'email' => 'email',
            'jenis_kelamin' => '',
            'alamat' => '',
            'tempat_lahir' => '',
            'tanggal_lahir' => '',
            'no_ponsel' => '',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
           
        ]);

       
        $apdetDataKurir = DataKurir::find($dataKurir) ;

        $foto = $request->file('gambar');
        if ($foto) {
            # code...
            
            Storage::delete('public/gambar/'.$apdetDataKurir->gambar);
            $gambar = $request->file('gambar')->getClientOriginalName();
            $foto = $request->file('gambar')->storeAs('public/gambar', $gambar);
            $apdetDataKurir->gambar = $gambar;
            
        }

        if($foto == null){
             $apdetDataKurir->gambar;
        }

        $apdetDataKurir->nik           = $request->nik;
        $apdetDataKurir->nama          = $request->nama;
        $apdetDataKurir->email         = $request->email;
        $apdetDataKurir->jenis_kelamin = $request->jenis_kelamin;
        $apdetDataKurir->alamat        = $request->alamat;
        $apdetDataKurir->tempat_lahir  = $request->tempat_lahir;
        $apdetDataKurir->tanggal_lahir = $request->tanggal_lahir;
        $apdetDataKurir->no_ponsel     = $request->no_ponsel;
        
        
        $apdetDataKurir->update();
       

        return response([
            'message' => 'data berhasil diupdate',
            'data' => $apdetDataKurir
        ], 200);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DataKurir  $dataKurir
     * @return \Illuminate\Http\Response
     */
    public function destroy($dataKurir)
    {
        $hapusDataKurir = DataKurir::find($dataKurir);
        if ($hapusDataKurir->gambar) {
            Storage::delete('public/gambar/'.$hapusDataKurir->gambar);
        }
        $hapusDataKurir->delete();
        return response([
            'message' => 'berhasil dihapus',
            'data' => $hapusDataKurir
        ], 200);
    }
}
