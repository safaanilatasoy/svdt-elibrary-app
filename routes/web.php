<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Book;




#Route::get('/',"BookController@index"); 
#Route::get('/edit/{id}',"BookController@edit"); 
#Route::get('/show/{id}',"BookController@show"); 
#Route::get('/create',"BookController@create"); 
#Route::post('/store',"BookController@store"); 
#Route::post('/update/{id}',"BookController@update"); 

Route::get('/', [BookController::class, 'index']);
 Route::get('/edit/{id}', [BookController::class, 'edit']);
Route::get('/show/{id}', [BookController::class, 'show']);
Route::get('/create', [BookController::class, 'create']);
 Route::post('/store', [BookController::class, 'store']);
 Route::post('/update/{id}', [BookController::class, 'update']);
//  Route::get('/download/{id}', [BookController::class, 'download']);
/**
* File Upload Routes
*/
Route::get('/download/{id}', [BookController::class, 'download']);

//  Route::post('/delete/{id}"', [BookController::class, 'delete']);





// Route::get('/delete',function($id){
//     $book = Book::find($id);
//     $book->delete();
//     return redirect('/') -> width('success','Book Deleted'); 
// });




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
