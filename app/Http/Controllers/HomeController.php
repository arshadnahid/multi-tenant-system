<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $data = array();
        $data['title'] = get_phrase('Admin List');
        $data['module'] = get_phrase('Admin');


        return view('backend.dashboard', $data);
    }
}
