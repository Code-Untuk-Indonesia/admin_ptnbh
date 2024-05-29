<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function account()
    {
        $user = Auth::user();
        return view('admin.content.account', compact('user'));
    }

    

    public function updateProfilePhoto(Request $request)
    {
        // Lakukan validasi terhadap request yang diterima

        // Simpan foto profil yang baru ke dalam penyimpanan yang diinginkan

        // Kembalikan respons atau tampilkan notifikasi berhasil/salah
    }

    // Method untuk menyimpan perubahan kata sandi
    public function updatePassword(Request $request)
    {
        // Lakukan validasi terhadap request yang diterima

        // Perbarui kata sandi pengguna yang sesuai dengan request

        // Kembalikan respons atau tampilkan notifikasi berhasil/salah
    }
}
