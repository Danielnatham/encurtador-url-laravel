<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    public function index(){
        return view('links.index');
    }

    public function create(){
        return view('links.create');
    }
}
