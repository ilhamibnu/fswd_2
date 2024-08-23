<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function indexlogin()
    {
        return view('user.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password harus diisi'
        ]);

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect('/')->with('login', 'Login berhasil');
        }

        return redirect()->back()->with('loginerror', 'Email atau password salah');
    }

    public function indexregister()
    {
        return view('user.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password harus diisi'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->id_role = 2;
        $user->save();

        return redirect('/login')->with('register', 'Registrasi berhasil');
    }

    public function updateprofil(Request $request)
    {
        if ($request->password != null) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'repassword' => 'required|same:password'
            ], [
                'name.required' => 'Nama harus diisi',
                'email.required' => 'Email harus diisi',
                'email.email' => 'Email tidak valid',
                'password.required' => 'Password harus diisi',
                'repassword.required' => 'Konfirmasi password harus diisi',
            ]);
        } else {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email'
            ], [
                'name.required' => 'Nama harus diisi',
                'email.required' => 'Email harus diisi',
                'email.email' => 'Email tidak valid'
            ]);
        }

        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password != null) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->back()->with('updateprofil', 'Profil berhasil diupdate');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('logout', 'Logout berhasil');
    }
}
