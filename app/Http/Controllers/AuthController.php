<?php

namespace App\Http\Controllers;

/**
 * 
 */
class AuthController extends Controller{
	

	function showLogin()
    {
        return view('login');
    }
    function loginProcess()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            return  redirect('berandaAdmin')->with('success', 'Login sukses');
        } else {
            return back()->with('danger', "Login Gagal cek Kembali");
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('berandaAdmin');
    }
    function register()
    {
        $user = new User;
        $user->nama = request('nama');
        $user->username = request('username');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));

        $user->save();
        return redirect('register')->with('success', 'Registrasi Berhasil');
    }

    function forgotPassword()
    {
    }
}