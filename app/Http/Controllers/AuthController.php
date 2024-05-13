<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

// use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function index()
    {
        return view('login.index');
    }
    public function login(Request $request)
    {
        //
        
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        // // dd($credentials);
        if (Auth::attempt($credentials)) {
        //     // if(auth())
        //     // if(auth()->user()->status == 0){
        //     //     // dd("kenek");
        //     //     auth()->logout();
        //     //     // dd(auth()->check());
        //     //     return redirect('/login')->with('nonValid' , 'Akun anda belum tervalidasi. Mohon menunggu admin untuk validasi');

        //     // };

            $request->session()->regenerate();

            Alert::success('Login Berhasil', 'Anda berhasil masuk ke sistem');
            return redirect()->intended('/');
        }
        // if ($credentials->fails()) {
        //     return back()->with('toast_error', $credentials->messages()->all()[0])->withInput();
        // }
        // toast('Your Post as been submited!','success');
        // Alert::toast('Login Gagal', 'toast_error');


        return back()->with('loginError', 'Login Gagal');

    }
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
