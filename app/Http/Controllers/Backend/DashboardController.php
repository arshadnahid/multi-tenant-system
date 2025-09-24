<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class DashboardController extends Controller
{
    public function index()
    {
        $data = array();
        $data['title'] = get_phrase('Admin List');
        $data['module'] = get_phrase('Admin');
        return view('backend.dashboard', $data);
    }
}
