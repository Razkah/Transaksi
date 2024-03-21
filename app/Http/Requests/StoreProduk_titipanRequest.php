<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduk_titipanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_produk' => 'required',
            'nama_suplier' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'stock' => 'required',
            'keterangan' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'nama_produk.required' => 'data nama produk belum diisi!',
            'nama_suplier.required' => 'data nama suplier belum diisi!',
            'harga_beli.required' => 'data harga belum diisi!',
            'harga_jual.required' => 'data harga belum diisi!',
            'stock.required' => 'data stock belum diisi!',
            'keterangan.required' => 'data keterangan belum diisi!',

        ];
    }
}
