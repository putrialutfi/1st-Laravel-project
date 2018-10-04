<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContohRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_contoh' => 'required|max:255',
            'deskripsi'   => 'required|string|max:500',
            'link'        => 'sometimes|string|max:200',
            'id_produk'   => 'required',
            'fotocontoh'  => 'sometimes|image|max:1000|mimes:jpeg,jpg,bmp,png',
        ];
    }
}
