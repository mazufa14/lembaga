<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //function index
    public function index(){
        return view('admin.dashboard'); //mengarahkan ke file dashboard yg ada didalam admin
    }

    //function index
    public function page(){
        return view('admin.pagenot'); //mengarahkan ke file dashboard yg ada didalam admin
    }
}
