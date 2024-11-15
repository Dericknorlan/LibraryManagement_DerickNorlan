<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsPapersController extends Controller
{
    public function index($sort = 'asc'){
        if ($sort == 'desc') {
            $newspapers = DB::select('select * from newspapers order by title desc');
        }
        else {
            $newspapers = DB::select('select * from newspapers order by title asc');
        } 
        return view('newspaper', compact('newspapers'));
    }
}
