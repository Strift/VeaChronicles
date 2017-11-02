<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function read()
    {
    	return view('read');
    }

    public function admin()
    {
        return view('admin');
    }
}
