<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Produk_titipan;


class ValidateDeletion
{
    public function handle($request, Closure $next)
    {
        $id = $request->route('id'); // Ambil ID dari URL

        // Lakukan validasi sesuai kebutuhan Anda, contoh:
        if (!Produk_titipan::find($id)) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        // Lanjutkan ke proses penghapusan jika validasi berhasil
        return $next($request);
    }
}
