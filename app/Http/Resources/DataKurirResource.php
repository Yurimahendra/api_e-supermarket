<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DataKurirResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nik' => $this->nik,
            'nama' => $this->nama,
            'email' => $this->email,
            'jenis_kelamin' => $this->jenis_kelamin,
            'alamat' => $this->alamat,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'no_ponsel' => $this->no_ponsel,
            'gambar' => $this->gambar,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
