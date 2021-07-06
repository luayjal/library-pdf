<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        $categories = Category::when($request->search,function($query,$value){
            $query->Where('name','like',"%{$value}%")
            ->orWhereHas('books',function ($query) use ($value) {
                $query->where('name','like',"%{$value}%");
           });
        })
        ->with(['books'=>function ($query) {
            $query->where('status', 'active');
       }])
       ->whereHas('books')
       
       ->limit(6)
       ->get();

        $books = Book::where('status','active')->limit(10)->get();
       return view('front.index',[
            'categories' => $categories,
            'books' => $books
        ]);
    }
}
