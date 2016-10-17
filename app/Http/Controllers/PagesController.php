<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function contact()
    {

        $name = 'Alexey';
        return view('pages/contact')->with('name', $name);
    }
}
