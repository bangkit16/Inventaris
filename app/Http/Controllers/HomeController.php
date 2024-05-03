<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $breadcumb = (object) [
            'title' => 'Dashboard',
            'list' => ['Home', 'Dashboard']
        ];

        $activeMenu = 'dashboard';

        return view('welcome', ['breadcumb' => $breadcumb, 'activeMenu' => $activeMenu]);
        // return view('welcome');
    }
}
