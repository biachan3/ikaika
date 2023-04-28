<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // return dd(request()->user()->role_id);
        if (request()->user() == null) {
            $results = Galeri::all();
            // return dd(request()->user());
            return view('user.index', compact('results'));

        } else if (request()->user()->role_id == 1) {

            return view('admin.home.index');
        } else {
            return view('user.index');

        }

    }
}
