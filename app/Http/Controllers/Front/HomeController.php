<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index(Request $request){
     /*  $categories = Category::with(['books' => function ($query) {
            $query->where('status', 'active');
       }])
       ->whereHas('books')
       ->limit(6) 
       ->get()
       ->map(function ($query) {
        $query->books = $query->books->take(6);
        return $query;
         });
     */
       
         $books = Book::where('status' , 'active')->latest()->take(18)->get();
         $highBooks = Book::where('status' , 'active')->orderBy('download_number','desc')->take(6)->get();
         
 
        //return $highBooks;

       // $books = Book::where('status','active')->limit(10)->get();
       return view('front.index',[
            //'categories' => $categories,
           'books' => $books,
           'highBooks' => $highBooks
        ]);
    }

    public function contactUs(){

        return view('front.contact-us');

    }

    public function storeMessage(Request $request){

   $request->merge([
           'slug'=>Str::slug_ar($request->name).'-'.Str::random(7),
       ]);
   // dd($request->all());
        Message::create($request->all());
        return redirect()->route('contact-us')->with(['success','تم الإرسال']);
    }
}
