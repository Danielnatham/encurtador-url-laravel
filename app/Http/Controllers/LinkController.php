<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    public function index(){
        return view('links.index');
    }

    public function create(){
        return view('links.create');
    }

    public function result($slug){

        //$data = DB::table('links')->latest()->first();


        return view('links.result', [
            'slug' => $slug,
        ]);
    }
}
