<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Book::paginate();
        return Book::all();
        //return Book::find(1);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return 'respuesta a post';
        //return $request;

        $request->validate([
            'title' => ['required']
        ]);

        $book = new Book;
        $book->title = $request->input('title');
        $book->save();

        return $book;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    //public function show(Book $book)
    public function show(Book $book)
    {
        return $book;
    }

    // alternativa sin hint tiping
    // public function show($book)
    // {
    //     return Book::find($book);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //return 'respuesta a patch';
        //return $book;

        $request->validate([
            'title' => ['required']
        ]);

        //$book = new Book;
        $book->title = $request->input('title');
        $book->save();

        return $book;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //return 'respuesta a delete';

        $book->delete();

        return response()->noContent();
    }
}
