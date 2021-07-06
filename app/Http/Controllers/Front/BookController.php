<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
  public $name=null;
    public function show($slug){

         $book = Book::where('slug',$slug)->first();

        $categories = Category::where('name',$book->category->name)
        ->with(['books' => function($q) use ($book){
            $q->where('name','<>',$book->name);
        }])->get();

        $size = Storage::disk('uploads')->size($book->file);
       $sizeFile= $size/1048576;
       substr($sizeFile,0,3);
        return view('front.book',[
            'book'=>$book,
            'categories'=>$categories,
            'sizeFile' =>  substr($sizeFile,0,4).' MB'
        ]);
    }

    public function downloadBook($slug){
        $book = Book::where('slug',$slug)->first();
        return Storage::disk('uploads')->download($book->file);
    }
}
