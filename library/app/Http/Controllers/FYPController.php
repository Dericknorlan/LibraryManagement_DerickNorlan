<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FYPController extends Controller
{
    public function index($sort = 'asc'){
        if ($sort == 'desc') {
            $finalYearProject = DB::select('select * from finalYearProject order by title desc');
        }
        else {
            $finalYearProject = DB::select('select * from finalYearProject order by title asc');
        } 
        return view('finalYearProject', compact('finalYearProject'));
    }
}
