<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateProdukController extends Controller
{
    /**
     * Menampilkan halaman create produk.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('createproduk');
    }

    /**
     * Menangani pembuatan produk.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        // Tambahkan logika validasi dan pembuatan produk di sini
    }
}
