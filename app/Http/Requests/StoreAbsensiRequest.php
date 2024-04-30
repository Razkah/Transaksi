<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAbsensiRequest extends FormRequest
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
            'nama_karyawan' => 'required',
            'tanggal_masuk' => 'required',
            'waktu_masuk' => 'required',
            'status' => 'required',
            'waktu_keluar' => 'required',
        ];
    }

    public function massages()
    {
        return [
            'nama_karyawan.required' => 'Data nama absensi belum diisi!',
            'tanggal_masuk.required' => 'Data nama absensi belum diisi!',
            'waktu_masuk.required' => 'Data nama absensi belum diisi!',
            'status_masuk.required' => 'Data nama absensi belum diisi!',
            'waktu_keluar.required' => 'Data nama absensi belum diisi!',
        ];
    }
}
