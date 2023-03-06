<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // return dd(request()->user()->role_id);
        if (request()->user() == null) {
            // return dd(request()->user());
            return view('user.index');

        } else if (request()->user()->role_id == 1) {

            return view('admin.template.dashboard');
        } else {
            return view('user.index');

        }
        
    }
}