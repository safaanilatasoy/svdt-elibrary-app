<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use DB;
use App\Models\File;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\StoreFileRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::all();
        return view('book',['books'=> $book,'layout'=>'index']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book = Book::all();
        
        return view('book',['books'=> $book,'layout'=>'create']);
    }
   
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book();
        $book -> id = $request->input('id');
        $book -> book_name = $request->input('book_name');
        $book -> book_author = $request->input('book_author');
        $book -> book_category = $request->input('book_category');
        // $book -> book_desc = $request -> input('book_desc');
        $fileName = $book->book_name . '.'. $request->file->extension();  

        $type = $request->file->getClientMimeType();
        $size = $request->file->getSize();
        

        $request->file->move(public_path('file'), $fileName);

        File::create([
            'name' => $fileName,
            'type' => $type,
            'size' => $size
        ]);
        $book->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        $books =Book::all();
        return view('book',['books'=>$books,'book'=>$book,'layout'=>'show']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $books =Book::all();
        return view('book',['books'=>$books,'book'=>$book,'layout'=>'edit']);
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
        $book = Book::find($id);
        
        $book -> book_name = $request->input('book_name');
        $book -> book_author = $request->input('book_author');
        $book -> book_category = $request->input('book_category');
       
        
        $book->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect('/') -> width('success','Book Deleted');  
    }

   
}


