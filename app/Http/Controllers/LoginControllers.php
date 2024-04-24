<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginControllers extends Controller
{
    /**
     * Menampilkan form login.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Proses login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Lakukan proses otentikasi
        if (Auth::attempt($credentials)) {
            // Jika otentikasi berhasil, arahkan pengguna ke halaman dashboard
            return redirect()->route('dashboard');
        } else {
            // Jika otentikasi gagal, kembalikan ke halaman login dengan pesan error
            return back()->withErrors(['email' => 'Login failed.']);
        }
    }

    /**
     * Logout pengguna.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // Setelah logout, arahkan pengguna kembali ke halaman login
        return redirect('/login');
    }
}
