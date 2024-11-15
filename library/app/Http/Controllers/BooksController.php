<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    public function index($sort = 'asc'){
        if ($sort == 'desc') {
            $books = DB::select('select * from books order by title desc');
        }
        else {
            $books = DB::select('select * from books order by title asc');
        } 
        return view('books', compact('books'));
    }
}
