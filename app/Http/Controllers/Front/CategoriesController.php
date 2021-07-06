<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Category::with('books')->whereHas('books')->get();
        return view('front.categories',[
            'categories' => $categories,
    ]);
    }

    public function show($slug){

        $categories = Category::where('slug',$slug)->with(['books'=>function($q){
            $q->where('status','active');
        }])->whereHas('books')->get();

        return view('front.categories-details',[
            'categories' => $categories,
    ]);

    }
}
