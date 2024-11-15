<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JournalController extends Controller
{
    public function index($sort = 'asc'){
        if ($sort == 'desc') {
            $journals = DB::select('select * from journals order by title desc');
        }
        else {
            $journals = DB::select('select * from journals order by title asc');
        } 
        return view('journals', compact('journals'));
    }
}
