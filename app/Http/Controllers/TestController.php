<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\book;

class TestController extends Controller
{
    public function index() {
        $books=book::all(); 
        print_r($books);
    }
    public function store(request $request) {
        $input=$request->all();
        print_r($input);
    }
}
