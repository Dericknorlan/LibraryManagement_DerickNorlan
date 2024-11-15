<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CDController extends Controller
{
    public function index($sort = 'asc'){
        if ($sort == 'desc') {
            $cd = DB::select('select * from cd order by title desc');
        }
        else {
            $cd = DB::select('select * from cd order by title asc');
        } 
        return view('cd', compact('cd'));
    }
}
