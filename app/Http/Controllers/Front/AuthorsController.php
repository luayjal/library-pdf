<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;

class AuthorsController extends Controller
{
    public function index(){

        $authors = Author::latest()->paginate(10);
        return view('front.authors',[
            'authors' => $authors
        ]);
    }

    public function show($slug){
        $authors = Author::where('slug',$slug)->with(['books'=>function($q){
            $q->where('status','active');
        }])->whereHas('books')->first();

        return view('front.authors-details',[
            'authors' => $authors
        ]);
    }

    public function search(Request $request){
        $books = Book::when($request->search,function($query , $value)
        {
            $query->where('name','like',"%{$value}%");
          
        })->where('status', 'active')->get();

        $authors = Author::when($request->search,function($query , $value)
        {
            $query->where('name','like',"%{$value}%");
          
        })->get();
        //return $books;
        return view('front.search',[
            'books' => $books,
            'authors' => $authors
        ]);
    }
}
