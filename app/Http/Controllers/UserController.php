<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $breadcumb = (object) [
            'title' => 'Daftar User',
            'list' => ['Home', 'User']
        ];

        $activeMenu = 'dashboard';

        return view('welcome', ['breadcumb' => $breadcumb, 'activeMenu' => $activeMenu]);
        // return view('welcome');
    }
}
