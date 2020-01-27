<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\book;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books=book::all();
        
        return view('index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validationData = $request->validate([
            'book_name' => 'required|max:255',
            'isbn_no' => 'required|alpha_num',
            'book_price' => 'required|numeric',
        ]);
        $book=book::create($validationData);

        return redirect('/books')->with('success','Book is succefully Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book=book::findOrFail($id);

        return view('edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validationData=$request->validate([
            'book_name' => 'required|max:255',
            'isbn_no' => 'required|alpha_num',
            'book_price' => 'required|numeric',
        ]);
            book::whereId($id)->update($validationData);

            return redirect('/books')->with('success','Book is Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $books=book::findOrFail($id);
        $books->delete();

        return redirect('/books')->with('success','Book is successfully deleted');
    }
}
